<?php

namespace Hanafalah\ModuleExamination\Schemas;

use Hanafalah\ModuleExamination\Contracts\Data\AssessmentData;
use Hanafalah\ModuleExamination\Contracts\Data\ExaminationData;
use Hanafalah\ModuleExamination\Contracts\Schemas\Examination as ContractsExamination;
use Hanafalah\ModuleMedicService\Enums\Label;
use Illuminate\Database\Eloquent\Collection;
use Hanafalah\ModulePatient\ModulePatient;
use Illuminate\Database\Eloquent\Model;
use Hanafalah\ModulePatient\Enums\{
    VisitRegistration\Activity as VisitRegistrationActivity,
    VisitRegistration\ActivityStatus as VisitRegistrationActivityStatus
};
use Illuminate\Support\Str;
use stdClass;

class Examination extends ModulePatient implements ContractsExamination
{
    protected string $__entity = 'Examination';

    public function storeExamination(?ExaminationData $examination_dto = null): array{
        return $this->transaction(function() use ($examination_dto) {
            return $this->prepareStoreExamination($examination_dto ?? $this->requestDTO(ExaminationData::class));
        });
    }

    public function prepareStoreExamination(ExaminationData $examination_dto): array{
        $visit_examination_model = &$examination_dto->visit_examination_model;
        $this->__open_forms      = $visit_examination_model->form_summaries ?? [];
        $this->__screening_forms = $visit_examination_model->screening_summaries ?? [];
        $this->addScreenings($examination_dto);

        $examination_dto->response = $core = [
            'assessment'         => null,
            'examination_summary'=> null,
            'prescription'       => null,
            'support'            => null,
            'treatments'         => [],
            'pharmacy_sale'      => [],
        ];

        // EXAMINATION STORE PROSES
        $exam_cores = array_values(array_keys($core));
        foreach ($exam_cores as $exam_core) {
            if (isset($examination_dto->{$exam_core}) && count($examination_dto->{$exam_core}) > 0) {
                switch ($exam_core) {
                    case 'treatments':
                        $medic_service = $examination_dto->visit_registration_model->medicService;
                        switch ($medic_service->flag) {
                            case Label::PATHOLOGY_CLINIC->value     : 
                            case Label::PATHOLOGY_ANATOMY->value    : $schema = 'lab_treatment';break;
                            case Label::RADIOLOGY->value            : $schema = 'radiology_treatment';break;
                            case Label::OUTPATIENT->value           : 
                            case Label::MCU->value                  : 
                            default                                 : $schema = 'clinical_treatment';break;
                        }
                        $this->prepareExamination($examination_dto,'treatments',Str::studly($schema));
                    break;
                    default:
                        $examination_dto->response[$exam_core] = new stdClass();
                        $this->prepareExamination($examination_dto,$exam_core);
                    break;
                }
            }
        }
        $visit_examination_model->setAttribute('screening_summaries', $this->__screening_forms ?? []);
        $visit_examination_model->setAttribute('form_summaries', $this->__open_forms ?? []);
        $visit_examination_model->save();

        // if (isset($attributes['examination_summary']) && count($attributes) > 0) {
        //     $attributes['examination_summary']['reference_id']   = static::$__visit_examination->getKey();
        //     $attributes['examination_summary']['reference_type'] = static::$__visit_examination->getMorphClass();
        //     $examination_summary = $this->appExaminationSummarySchema()->prepareStoreExaminationSummary($attributes['examination_summary']);
        //     $new_collection['examination_summary'] = $examination_summary->toViewApi();
        // }

        // // ADD ADDENDUM
        // if (isset($attributes['addendum'])) {
        //     static::$__examination_summary->addendum = $attributes['addendum'];
        //     static::$__examination_summary->save();
        // }

        // if (isset($attributes['prescription']) && count($attributes) > 0) {
        //     request()->merge([
        //         'warehouse_id' => request()->pharmacy_id ?? null
        //     ]);
        //     $this->prepareService($new_collection['prescription'], $attributes['prescription']);
        // }

        // if (isset($attributes['pharmacy_sale'])) {
        //     $pharmacy = &$attributes['pharmacy_sale'];
        //     $pharmacy['warehouse_id'] = $attributes['warehouse_id'];
        //     $pharmacy['pharmacy_id']  = $attributes['pharmacy_id'];
        //     $this->pharmacyDispense($new_collection['pharmacy_sale'], $pharmacy);
        // }

        // static::$__visit_examination->is_commit = Commit::COMMIT->value;

        if ($examination_dto->visit_patient_model->reference_type == 'VisitPatient') {
            $this->toPoliExamStart($examination_dto);
        }
        return $examination_dto->response;
    }

    private function prepareExamination(ExaminationData &$examination_dto, $exam_key, ?string $morph = null){
        $examination_dto->response[$exam_key] = [];

        $response = &$examination_dto->response[$exam_key];
        $current_exam = $examination_dto->{$exam_key};
        foreach ($current_exam as $key => &$exam) {
            if (isset($exam['data'])){
                $studly_key = Str::studly($key);
                if ($exam_key == 'assessments') $this->setToOpenForm($studly_key);

                $response = (object) $response;
                $exam_data = $exam['data'];
                if (array_is_list($exam_data)){
                    $response->{$key} = (object) ['data' => []];
                    $current_response = &$response->{$key};
                    $key = $studly_key;
                    foreach ($exam_data as $data) {
                        $result = $this->prepareAssessment($data,$key,$examination_dto);
                        if (is_bool($result)) continue;
                        $current_response->data[] = $result->toViewApi()->resolve();
                    }
                    $current_response->data = new Collection($current_response->data);
                }else{
                    $response->{$key} = (object) ['data' => new stdClass];
                    $result = $this->prepareAssessment($exam_data,$studly_key,$examination_dto);
                    if (is_bool($result)) continue;
                    $response->{$key}->data = $result->toViewApi()->resolve();
                }
            }else{
                $result = $this->prepareAssessment($exam,$morph,$examination_dto);
                if (is_bool($result)) continue;
                $response[] = $result->toViewApi()->resolve();
            }
        }
        if (array_is_list($current_exam)) $response = new Collection($response);
    }

    private function prepareAssessment(array &$exam_data, string $studly_key, ExaminationData $examination_dto){
        $exam_data['morph'] = $studly_key;
        $exam_data['visit_examination_model'] = $examination_dto->visit_examination_model;
        $exam_data = $this->requestDTO(AssessmentData::class,$exam_data);
        return $this->dataPreparation($this->schemaContract($studly_key), $exam_data);
    }

    public function commitExamination(): array{
        $attributes ??= request()->all();
        $this->initializeExamination($attributes);
        $this->toPoliExamStart();
        return $this->appPractitionerEvaluationSchema()->commitPractitionerEvaluation();
    }


    public function addScreenings(ExaminationData $examination_dto): array{
        $new_screenings = [];
        $screenings = &$examination_dto->screening_ids;
        $screenings = array_values(array_unique($screenings));
        if (isset($screenings) && count($screenings) > 0) {
            $this->__screening_forms ??= [];
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

    protected function setToOpenForm($key){
        if (!(
            !isset($this->__screening_forms) && 
            count($this->__screening_forms) > 0 && 
            in_array($key, $this->__screening_forms)
        )) {
            $form = $this->FormModel()->where('morph', $key)->first();
            if (isset($form)) {
                $this->__open_forms[] = [
                    $form->getKeyName() => $form->getKey(),
                    'name' => $form->name
                ];
            }
        }
    }

    protected function dataPreparation($class, $assessment_dto){
        if (isset($data->is_delete) && $data->is_delete) {
            return $class->prepareRemoveAssessment($data);
        } else {
            return $class->prepareStore($assessment_dto);
        }
    }

    public function addPractitioner(?array $attributes = null): Model{
        return $this->schemaContract('practitioner_evaluation')->prepareStorePractitioner($attributes);
    }

    protected function toPoliExamStart(ExaminationData $examination_dto): self{
        $visit_patient = $examination_dto->visit_patient_model;
        $visit_registration = $examination_dto->visit_registration_model;
        $visit_registration->pushActivity(VisitRegistrationActivity::POLI_EXAM->value, [VisitRegistrationActivityStatus::POLI_EXAM_START->value]);
        $this->appVisitPatientSchema()->preparePushLifeCycleActivity($visit_patient, $visit_registration, 'POLI_EXAM', [
            'POLI_EXAM_START' => $visit_registration::$activityList[VisitRegistrationActivity::POLI_EXAM->value . '_' . VisitRegistrationActivityStatus::POLI_EXAM_START->value]
        ]);
        return $this;
    }

    protected function pharmacyDispense(&$new_collection, array &$attributes){
        $patient_summary_id = isset(static::$__patient_summary) ? static::$__patient_summary->getKey() : null;
        $prepare_attributes = [
            'visit_examination_id'   => static::$__visit_examination->getKey(),
            'examination_summary_id' => static::$__examination_summary->getKey(),
            'patient_summary_id'     => $patient_summary_id ?? null,
            'patient_id'             => static::$__visit_patient->patient_id ?? null
        ];
        $new_collection = $this->schemaContract('pharmacy_sale_examination')->prepareStore($this->mergeArray($prepare_attributes, $attributes));
    }
}
