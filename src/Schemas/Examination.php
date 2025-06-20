<?php

namespace Hanafalah\ModuleExamination\Schemas;

use Hanafalah\ModuleExamination\Contracts\Schemas\Examination as ContractsExamination;
use Hanafalah\ModuleExamination\Resources\Examination\Assessment\ViewAssessment;
use Hanafalah\ModuleMedicService\Enums\Label;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Hanafalah\ModulePatient\Enums\EvaluationEmployee\Commit;
use Hanafalah\ModulePatient\ModulePatient;
use stdClass;
use Hanafalah\ModulePatient\Enums\{
    VisitRegistration\Activity as VisitRegistrationActivity,
    VisitRegistration\ActivityStatus as VisitRegistrationActivityStatus
};

class Examination extends ModulePatient implements ContractsExamination
{
    protected array $__guard   = ['id', 'visit_examination_id', 'examination_summary_id', 'patient_summary_id'];
    protected array $__add     = [];
    protected string $__entity = 'Examination';

    protected static $__visit_examination;
    protected static $__visit_registration;
    protected static $__visit_patient;
    protected static $__patient;
    protected static $__examination_summary;
    protected static $__patient_summary;
    protected static $__practitioner_evaluation;
    protected $__screening_forms;
    protected $__open_forms;

    protected array $__resources = [
        'view' => ViewAssessment::class
    ];

    protected function initVisitExamination(mixed $visit_examination_id): self
    {
        if (!isset($visit_examination_id)) throw new \Exception('visit_examination_id is required');
        static::$__visit_examination = $this->VisitExaminationModel()->find($visit_examination_id);

        if (!isset(static::$__visit_examination)) throw new \Exception('visit examination is not found');
        $this->initExaminationSummary(static::$__visit_examination);
        return $this;
    }

    protected function initExaminationSummary(Model $reference): self
    {
        $reference = $reference->examinationSummary()->firstOrCreate();
        static::$__examination_summary = $reference;
        return $this;
    }

    protected function initializeExamination(array $attributes): self
    {
        if (!isset($attributes['visit_examination_id'])) throw new \Exception('visit_examination_id is required');
        $this->initVisitExamination($attributes['visit_examination_id'])
            ->initExaminationSummary(static::$__visit_examination)
            ->initPatientSummary(static::$__visit_examination);
        if (isset($attributes['practitioner_id'])) {
            static::$__practitioner_evaluation = $this->appPractitionerEvaluationSchema()->prepareStorePractitionerEvaluation($attributes);
        }
        return $this;
    }

    public function prepareBulkStoreExamination(?array $attributes = null): array
    {
        $attributes ??= request()->all();
        $this->initializeExamination($attributes);
        $attributes['screenings'] ??= [];

        $screenings = static::$__visit_examination->screenings;
        if (isset($screenings) && count($screenings) > 0) {
            foreach ($screenings as $screening) $attributes['screenings'][] = $screening['id'];
        }
        $screenings = $this->addScreenings($attributes['screenings']);

        $new_collection     = [
            'examination_summary' => new stdClass(),
            'examination'   => new stdClass(),
            'pharmacy_sale' => (object) [
                'consument' => new stdClass(),
                'dispense'  => new stdClass()
            ],
            'treatments'    => [],
            'prescription'  => new stdClass(),
            'medical_support' => new stdClass(),
        ];
        $this->__open_forms = [];

        // EXAMINATION STORE PROSES
        if (isset($attributes['examination']) && count($attributes) > 0) {
            $this->prepareService($new_collection['examination'], $attributes['examination']);
        }

        if (isset($attributes['examination_summary']) && count($attributes) > 0) {
            $attributes['examination_summary']['reference_id']   = static::$__visit_examination->getKey();
            $attributes['examination_summary']['reference_type'] = static::$__visit_examination->getMorphClass();
            $examination_summary = $this->appExaminationSummarySchema()->prepareStoreExaminationSummary($attributes['examination_summary']);
            $new_collection['examination_summary'] = $examination_summary->toViewApi();
        }

        // ADD ADDENDUM
        if (isset($attributes['addendum'])) {
            static::$__examination_summary->addendum = $attributes['addendum'];
            static::$__examination_summary->save();
        }


        if (isset($attributes['treatments']) && count($attributes['treatments']) > 0) {
            $medic_service = static::$__visit_registration->medicService;
            switch ($medic_service->flag) {
                case Label::LABORATORY->value:
                    $schema = 'lab_treatment';
                    break;
                case Label::RADIOLOGY->value:
                    $schema = 'radiology_treatment';
                    break;
                case Label::OUTPATIENT->value:
                    $schema = 'clinical_treatment';
                    break;
                case Label::MCU->value:
                    $schema = 'clinical_treatment';
                    break;
            }
            $examination_treatment_schema = $this->schemaContract($schema);
            foreach ($attributes['treatments'] as $treatment) {
                if (isset($treatment['is_delete']) && $treatment['is_delete']) {
                    $examination_treatment_schema->prepareRemoveAssessment($treatment);
                } else {
                    $treatment_model = $this->TreatmentModel()->with('reference')->find($treatment['treatment_id']);
                    $treatment_exam = $examination_treatment_schema->prepareStore(
                        $this->mergeArray($treatment, [
                            'id'                     => $treatment['id'] ?? null,
                            'visit_examination_id'   => static::$__visit_examination->getKey(),
                            'examination_summary_id' => static::$__examination_summary->getKey(),
                            'patient_summary_id'     => static::$__patient_summary->getKey(),
                            'treatment_id'           => $treatment_model->getKey(),
                            'service_label_id'       => $treatment_model->service_label_id ?? null,
                            'service_label_name'     => $treatment_model->service_label_name ?? null,
                            'files'                  => $treatment['files'] ?? null,
                            'interpretation'         => $treatment['interpretation'] ?? null,
                            'result'                 => $treatment['result'] ?? null,
                            'note'                   => $treatment['note'] ?? null,
                            'form'                   => $treatment['form'] ?? null,
                            'status'                 => $treatment['status'] ?? 'DRAFT'
                        ])
                    );
                    $new_collection['treatments'][] = $treatment_exam;
                }
            }
            $new_collection['treatments'] = new Collection($new_collection['treatments']);
        }

        if (isset($attributes['medical_support']) && count($attributes['medical_support']) > 0) {
            foreach ($attributes['medical_support'] as $key => $medical_support) {
                if (!isset($medical_support['data'])) continue;
                $new_collection['medical_support']->{$key} = (object) ['data' => []];
                if (isset($medical_support['data']['name'])) {
                    $medical_support['data'] = [$medical_support['data']];
                }
                foreach ($medical_support['data'] as $keyData => $data) {
                    if ($key === $this->MedicalSupportModel()->getMorphClass()) {
                        if (isset($attributes['medical_support_type_id'])) {
                            $schema = $this->ExaminationStuffModel()->findOrFail($attributes['medical_support_type_id']);
                            $medical_support_schema = $this->schemaContract($key);
                        } else {
                            $schema = 'medical_support';
                            $medical_support_schema = $this->schemaContract($schema);
                        }
                    } else {
                        $schema = Str::snake($key, '_');
                        $medical_support_schema = $this->schemaContract($schema);
                    }
                    $result = $this->dataPreparation($medical_support_schema, $data);
                    if (\is_bool($result)) continue;
                    $new_collection['medical_support']->{$key}->data[] = $result;
                }
                $new_collection['medical_support']->{$key}->data = new Collection($new_collection['medical_support']->{$key}->data);
            }
            $new_collection['medical_support'] = new Collection($new_collection['medical_support']);
        }
        if (isset($attributes['prescription']) && count($attributes) > 0) {
            request()->merge([
                'warehouse_id' => request()->pharmacy_id ?? null
            ]);
            $this->prepareService($new_collection['prescription'], $attributes['prescription']);
        }

        if (isset($attributes['pharmacy_sale'])) {
            $pharmacy = &$attributes['pharmacy_sale'];
            $pharmacy['warehouse_id'] = $attributes['warehouse_id'];
            $pharmacy['pharmacy_id']  = $attributes['pharmacy_id'];
            $this->pharmacyDispense($new_collection['pharmacy_sale'], $pharmacy);
        }

        static::$__visit_examination->is_commit = Commit::COMMIT->value;

        static::$__visit_examination->setAttribute('screenings', $screenings);
        static::$__visit_examination->setAttribute('forms', $this->__open_forms ?? []);

        static::$__visit_examination->save();

        if (static::$__visit_patient->reference_type == $this->VisitPatientModel()::CLINICAL_VISIT) {
            $this->toPoliExamStart();
        }
        return $new_collection;
    }

    protected function toPoliExamStart(): self
    {
        $visit_registration = static::$__visit_registration ?? static::$__visit_examination->visitRegistration;
        $visit_patient      = static::$__visit_patient ?? $visit_registration->visitPatient;
        $visit_registration->pushActivity(VisitRegistrationActivity::POLI_EXAM->value, [VisitRegistrationActivityStatus::POLI_EXAM_START->value]);
        $this->appVisitPatientSchema()->preparePushLifeCycleActivity($visit_patient, $visit_registration, 'POLI_EXAM', [
            'POLI_EXAM_START' => $visit_registration::$activityList[VisitRegistrationActivity::POLI_EXAM->value . '_' . VisitRegistrationActivityStatus::POLI_EXAM_START->value]
        ]);
        return $this;
    }

    protected function pharmacyDispense(&$new_collection, array &$attributes)
    {
        $patient_summary_id = isset(static::$__patient_summary) ? static::$__patient_summary->getKey() : null;
        $prepare_attributes = [
            'visit_examination_id'   => static::$__visit_examination->getKey(),
            'examination_summary_id' => static::$__examination_summary->getKey(),
            'patient_summary_id'     => $patient_summary_id ?? null,
            'patient_id'             => static::$__visit_patient->patient_id ?? null
        ];
        $new_collection = $this->schemaContract('pharmacy_sale_examination')->prepareStore($this->mergeArray($prepare_attributes, $attributes));
    }

    private function prepareService(&$new_collection, array &$attributes)
    {
        foreach ($attributes as $key => $attribute) {
            if (!isset($attribute['data'])) continue;
            if (config('app.contracts.'.$key) !== null) {
                $class = $this->schemaContract($key);
                $this->setToOpenForm($key);
                if (array_is_list($attribute['data'])) {
                    $new_collection->{$key} = (object) ['data' => []];
                    foreach ($attribute['data'] as $data) {
                        $result = $this->dataPreparation($class, $data);
                        if (is_bool($result)) continue;
                        $new_collection->{$key}->data[] = $result;
                    }
                    $new_collection->{$key}->data = new Collection($new_collection->{$key}->data);
                } else {
                    $new_collection->{$key} = (object) ['data' => new stdClass];
                    $result = $this->dataPreparation($class, $attribute['data']);
                    if (is_bool($result)) continue;
                    $new_collection->{$key}->data = $result;
                }
            }
        }
    }

    public function commitExamination(): array
    {
        $attributes ??= request()->all();
        $this->initializeExamination($attributes);
        $this->toPoliExamStart();
        return $this->appPractitionerEvaluationSchema()->commitPractitionerEvaluation();
    }


    public function addScreenings(array $screenings): array
    {
        $new_screenings = [];
        $screenings = array_values(array_unique($screenings));
        if (isset($screenings) && count($screenings) > 0) {
            $this->__screening_forms = [];
            foreach ($screenings as $screening) {
                $screening = $this->ScreeningModel()->with('forms')->find($screening);
                if (isset($screening)) {
                    if (isset($screening->forms) && count($screening->forms) > 0) {
                        $this->__screening_forms = $this->mergeArray($this->__screening_forms, $screening->forms);
                    }
                    $new_screenings[] = [
                        $screening->getKeyName() => $screening->getKey(),
                        'name'                   => $screening->name
                    ];
                }
            }
        }
        return $new_screenings;
    }

    private function setToOpenForm($key)
    {
        $is_form = true;
        if (isset($this->__screening_forms) && count($this->__screening_forms) > 0) {
            if (in_array($key, $this->__screening_forms)) $is_form = false;
        }
        if ($is_form) {
            $form = $this->FormModel()->where('morph', $key)->first();
            if (isset($form)) {
                $this->__open_forms[] = [
                    $form->getKeyName() => $form->getKey(),
                    'name' => $form->name
                ];
            }
        }
    }

    private function dataPreparation($class, $data)
    {
        if (isset($data['is_delete']) && $data['is_delete']) {
            return $class->prepareRemoveAssessment($data);
        } else {
            $data['visit_examination_id']   = static::$__visit_examination->getKey();
            $data['examination_summary_id'] = static::$__examination_summary->getKey();
            $data['patient_summary_id']     = (isset(static::$__patient_summary)) ? static::$__patient_summary->getKey() : null;
            $data['patient_id']             = static::$__visit_patient->patient_id ?? null;
            return $class->prepareStore($data);
        }
    }

    public function storeBulkStoreExamination(): array
    {
        return $this->transaction(function () {
            $results = $this->prepareBulkStoreExamination();
            if (isset($results['examination'])) {
                foreach ($results['examination'] as $key => &$exam) {
                    if (isset($exam->data)) $exam->data = $this->viewEntityResource(function() use ($exam){
                        return $exam->data;
                    });
                }
            }
            if (isset($results['treatments']) && count($results['treatments']) > 0) {
                foreach ($results['treatments'] as $key => &$exam) {
                    $exam = $this->viewEntityResource(function() use ($exam){
                        return $exam;
                    });
                    $results['treatments'][$key] = $exam;
                }
            }
            return $results;
        });
    }

    public function addPractitioner(?array $attributes = null): Model{
        return $this->schemaContract('practitioner_evaluation')->prepareStorePractitioner($attributes);
    }
}
