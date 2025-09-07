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

    // public function prepareStoreMultipleExaminationTreatment(?array $attributes = null): Collection
    // {
    //     $attributes ??= request()->all();
    //     $treatments   = $this->mustArray($attributes['treatment'] ?? $attributes['treatments']);
    //     $practitioner = $this->addPractitioner($attributes['visit_examination_id']);

    //     $treatment_models = [];
    //     foreach ($treatments as $treatment) {
    //         $treatment = $this->mergeArray($treatment, [
    //             'practitioner_id'      => $treatment['practitioner_id'] ?? $practitioner->getKey(),
    //             'visit_examination_id' => $attributes['visit_examination_id']
    //         ]);
    //         $treatment_models[] = $this->prepareStoreExaminationTreatment($treatment);
    //     }
    //     return new Collection($treatment_models);
    // }

    // public function calculatingTreatmentDebt(?array $attributes = null){
    //     $attributes ??= request()->all();
    //     if (!isset($attributes['visit_examination_id'])) throw new \Exception('visit_examination_id is required');

    //     $morphs      = [$this->VisitPatientModel()->getMorphClass()];
    //     $transaction = $this->TransactionModel()->with('paymentSummary')
    //         ->whereHasMorph('reference', $morphs, function ($query) use ($attributes) {
    //             $query->whereHas('visitExamination', function ($query) use ($attributes) {
    //                 $query->where('id', $attributes['visit_examination_id']);
    //             });
    //         })->first();
    //     if (!isset($transaction)) throw new \Exception('transaction is not found');

    //     $examination_treatments = $this->examinationTreatment()->with('treatment')
    //         ->where('visit_examination_id', $attributes['visit_examination_id'])
    //         ->whereDoesntHave('transactionItem', function ($query) use ($transaction) {
    //             $query->where('transaction_id', $transaction->getKey());
    //         })->get();
    //     $transaction_item_schema = $this->schemaContract('transaction_item');
    //     foreach ($examination_treatments as $examination_treatment) {
    //         $attributes['amount'] = $examination_treatment->treatment->price;

    //         $transaction_item_schema->prepareStoreTransactionItem([
    //             'transaction_id' => $transaction->getKey(),
    //             'item_type'      => $this->ServiceModel()->getMorphClass(),
    //             'item_id'        => $examination_treatment->treatment_id,
    //             'item_name'      => $examination_treatment->name,
    //             'payment_detail' => [
    //                 'payment_summary_id' => $transaction->paymentSummary->getKey(),
    //                 'qty'                => $attributes['qty'] ?? 1,
    //                 'amount'             => $attributes['amount'],
    //                 'tax'                => $attributes['tax'] ?? 0
    //             ]
    //         ]);
    //     }
    // }

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
            $this->schemaContract('transaction_item')
                 ->prepareStoreTransactionItem($transaction_item_dto);
        }

        $this->fillingProps($examination_treatment, $examination_treatment_dto->props);
        $examination_treatment->save();
        return $this->examination_treatment_model = $examination_treatment;
    }
}
