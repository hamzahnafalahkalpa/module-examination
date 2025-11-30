<?php

namespace Hanafalah\ModuleExamination\Schemas\Examination;

use Hanafalah\ModuleExamination\Contracts\Schemas\Examination\ExaminationTreatment as ExaminationExaminationTreatment;
use Hanafalah\ModuleExamination\Contracts\Data\Examination\ExaminationTreatmentData;
use Hanafalah\ModuleExamination\Schemas\Examination;
use Illuminate\Database\Eloquent\Model;

class ExaminationTreatment extends Examination implements ExaminationExaminationTreatment
{
    protected string $__entity = 'ExaminationTreatment';
    public $examination_treatment_model;

    protected array $__cache = [
        'index' => [
            'name'      => 'examination_treatment',
            'tags'      => ['examination', 'examination_treatment', 'examination_treatment-index'],
            'duration'  => 30
        ]
    ];

    public function prepareStoreExaminationTreatment(ExaminationTreatmentData $examination_treatment_dto): Model{
        $add = [
            'name'  => $examination_treatment_dto->name,
            'qty'   => $examination_treatment_dto->qty,
            'price' => $examination_treatment_dto->price
        ];

        if (isset($attributes['id'])) {
            $guard = ['id' => $attributes['id']];
        }else{
            $guard = [
                'visit_examination_id'   => $examination_treatment_dto->visit_examination_id,
                // 'examination_summary_id' => $examination_treatment_dto->examination_summary_id ?? static::$__examination_summary->getKey(),
                'patient_summary_id'     => $examination_treatment_dto->patient_summary_id,
                'treatment_id'           => $examination_treatment_dto->treatment_id,
                'reference_type'         => $examination_treatment_dto->reference_type,
                'reference_id'           => $examination_treatment_dto->reference_id,
            ];
        }
        $examination_treatment = $this->usingEntity()->updateOrCreate($guard, $add);
        if (isset($examination_treatment_dto->transaction_item)) {
            $transaction_item_dto = &$examination_treatment_dto->transaction_item;
            $transaction_item_dto->item_id   = $examination_treatment->reference_id;
            $transaction_item_dto->item_type = $examination_treatment->reference_type;
            $entity = config('module-examination.transaction_item');
            $this->schemaContract($entity)
                 ->{'prepareStore'.$entity}($transaction_item_dto);
        }

        $this->fillingProps($examination_treatment, $examination_treatment_dto->props);
        $examination_treatment->save();
        return $this->examination_treatment_model = $examination_treatment;
    }
}
