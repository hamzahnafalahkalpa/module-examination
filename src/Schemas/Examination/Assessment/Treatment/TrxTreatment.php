<?php

namespace Hanafalah\ModuleExamination\Schemas\Examination\Assessment\Treatment;

use Hanafalah\ModuleExamination\Contracts\Data\AssessmentData;
use Hanafalah\ModuleExamination\Contracts\Schemas\{
    Examination\Assessment\Treatment\TrxTreatment as ContractsTrxTreatment,
};
use Hanafalah\ModuleExamination\Schemas\Examination\Assessment\Assessment;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class TrxTreatment extends Assessment implements ContractsTrxTreatment
{
    public $trx_treatment_model;

    public function prepareDeleteAssessment(?array $attributes = null): bool{
        $attributes ??= request()->all();
        $result = parent::prepareDeleteAssessment($attributes);
        if (isset($this->assessment_model)) {
            $this->ExaminationTreatmentModel()->where('reference_id', $this->assessment_model->getKey())
                ->where('reference_type', $this->assessment_model->morph)
                ->where('treatment_id', $this->assessment_model->treatment_id)
                ->delete();
            if (isset($this->assessment_model->form) && isset($this->assessment_model->form['id'])) {
                $this->AssessmentModel()->destroy($this->assessment_model->form['id']);
            }
        }
        return $result;
    }

    public function prepareStore(AssessmentData $assessment_dto): Model{
        $assessment_exam = &$assessment_dto->props['exam'];
        $treatment_model = $this->TreatmentModel()->with('reference')->findOrFail($assessment_exam['treatment_id']);
        $assessment_exam = $this->mergeArray($assessment_exam, [
            'name'                   => $treatment_model->name,
            'service_label_id'       => $treatment_model->service_label_id ?? null,
            'service_label'          => $treatment_model->prop_service_label ?? null,
            'files'                  => $assessment_exam['files'] ?? null,
            'interpretation'         => $assessment_exam['interpretation'] ?? null,
            'result'                 => $assessment_exam['result'] ?? null,
            'note'                   => $assessment_exam['note'] ?? null,
            'form'                   => $assessment_exam['form'] ?? null,
            'qty'                    => $assessment_exam['qty'] ?? 1,
            'medications'            => $assessment_exam['medications'] ?? [],
            'treatment_at'           => $assessment_exam['treatment_at'] ?? now(),
            'paths'                  => $assessment_exam['paths'] ?? [],
            'treatment'              => $treatment_model->toViewApi()->resolve(),
            'status'                 => $assessment_exam['status'] ?? 'DRAFT'
        ]);

        // $assessment = $this->assessment_model;

        if (isset($assessment_exam['form'])) {
            $service_label = $treatment_model->prop_service_label;
            //FOR VACCINE
            // if (isset($service_label) && $service_label['name'] == 'VACCINE') {
            //     $medical_treatment = $treatment_model->reference;
            //     $new_assessment = $this->schemaContract('vaccine')->prepareStore($this->mergeArray([
            //         'visit_examination_id'   => static::$__visit_examination->getKey(),
            //         'examination_summary_id' => static::$__examination_summary->getKey(),
            //         'patient_summary_id'     => static::$__patient_summary->getKey(),
            //         'treatment_id'           => $this->trx_treatment_model->getKey(),
            //         'parent_id'              => $this->assessment_model->getKey(),
            //         'patient_id'             => static::$__visit_patient->patient_id ?? null,
            //         'vaccine'                => $vaccine ?? null
            //     ], $attributes['form']));
            //     $attributes['form']['is_lifetime'] = $new_assessment->is_lifetime;
            //     $attributes['form']['valid_until'] = $new_assessment->valid_until;
            //     $attributes['form']['id'] = $new_assessment->getKey();
            //     $assessment->setAttribute('form', $attributes['form']);
            // } else {
            //     $assessment->setAttribute('form', $attributes['form']);
            // }
        }
        if (isset($assessment_exam['files']) && count($assessment_exam['files']) > 0) {
            $assessment_exam = $this->storePdf($assessment_exam, 'treatment_' . $treatment_model->reference_type);
        }
        $this->trx_treatment_model = $treatment = $this->prepareStoreAssessment($assessment_dto);
        $this->addExaminationTreatment($assessment_dto,$treatment,$treatment_model);

        return $this->assessment_model = $treatment;
    }

    public function addExaminationTreatment(AssessmentData $assessment_dto,Model $assessment, Model $treatment): Model{
        return $this->schemaContract('examination_treatment')
                    ->prepareStoreExaminationTreatment($this->requestDTO(
                        config('app.contracts.ExaminationTreatmentData'),[
                        'reference_id'   => $assessment->getKey(),
                        'reference_type' => $assessment->morph,
                        'treatment_id'   => $assessment->exam['treatment_id'],
                        'patient_summary_id'       => $assessment_dto->patient_summary_model->getKey(),
                        'visit_examination_id'     => $assessment_dto->visit_examination_id,
                        'treatment_model'          => $treatment,
                        'visit_examination_model'  => $assessment_dto->visit_examination_model,
                        'visit_registration_model' => $assessment_dto->visit_registration_model,
                        'visit_patient_model'      => $assessment_dto->visit_patient_model,
                        'patient_model'            => $assessment_dto->patient_model,
                        'patient_summary_model'    => $assessment_dto->patient_summary_model,
                    ]));
    }

    public function trxTreatment(): Builder{
        return $this->generalSchemaModel()->withParameters('or');
    }
}
