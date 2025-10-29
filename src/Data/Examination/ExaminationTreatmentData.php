<?php

namespace Hanafalah\ModuleExamination\Data\Examination;

use Hanafalah\ModuleExamination\Contracts\Data\Examination\ExaminationTreatmentData as DataExaminationTreatmentData;
use Hanafalah\ModuleExamination\Data\ExaminationData;
use Hanafalah\ModulePayment\Contracts\Data\PosTransactionItemData;
use Hanafalah\ModuleTransaction\Contracts\Data\TransactionItemData;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Attributes\MapName;

class ExaminationTreatmentData extends ExaminationData implements DataExaminationTreatmentData{
    #[MapName('id')]
    #[MapInputName('id')]
    public mixed $id = null;

    #[MapName('name')]
    #[MapInputName('name')]
    public string $name;

    #[MapName('examination_summary_id')]
    #[MapInputName('examination_summary_id')]
    public mixed $examination_summary_id = null;

    #[MapName('reference_type')]
    #[MapInputName('reference_type')]
    public ?string $reference_type = null;

    #[MapName('reference_id')]
    #[MapInputName('reference_id')]
    public mixed $reference_id = null;

    #[MapName('reference_model')]
    #[MapInputName('reference_model')]
    public ?object $reference_model = null;

    #[MapName('qty')]
    #[MapInputName('qty')]
    public ?int $qty = null;

    #[MapName('price')]
    #[MapInputName('price')]
    public ?int $price = null;

    #[MapName('treatment_id')]
    #[MapInputName('treatment_id')]
    public mixed $treatment_id = null;
    
    #[MapName('treatment_model')]
    #[MapInputName('treatment_model')]
    public mixed $treatment_model = null;

    #[MapName('transaction_item')]
    #[MapInputName('transaction_item')]
    public ?PosTransactionItemData $transaction_item = null;

    #[MapName('props')]
    #[MapInputName('props')]
    public ?array $props = null;

    public static function before(array &$attributes){
        $new = static::new();

        if (isset($attributes['treatment_model'])) $attributes['treatment_id'] ??= $attributes['treatment_model']->id;
        $treatment = $attributes['treatment_model'] ?? $new->TreatmentModel()->findOrFail($attributes['treatment_id']);
        $prop['prop_treatment'] = $treatment->toViewApi()->resolve();

        $attributes['reference_type'] ??= $treatment->reference_type;
        $qty = $attributes['qty']   ??= 1;
        $price = $attributes['price'] ??= $treatment->price ?? 0;

        $tax                = $treatment->tax ?? 0;
        $additional         = $treatment->additional ?? 0;
        $amount             = ($qty * $price) + $additional + $tax;

        if (isset($attributes['reference_model'])){
            $reference_model = $attributes['reference_model'];
            $attributes['reference_id'] ??= $reference_model->getKey();
            $attributes['reference_type'] ??= $reference_model->getMophClass();
        }

        $attributes['transaction_item'] ??= [
            'item_id'    => $attributes['reference_id'],
            'item_type'  => $attributes['reference_type'],
            'item_model' => $attributes['reference_model'] ?? null,
            'transaction_id' => null,
            'payment_detail' => [
                'payment_summary_id'  => null,
                'transaction_item_id' => null,
                'qty'        => $attributes['qty'],
                'price'      => $attributes['price'],
                'amount'     => $amount,
                'debt'       => $amount,
                'cogs'       => $treatment->cogs ?? 0,
                'tax'        => $tax,
                'additional' => $additional
            ]
        ];
        $attributes['name'] ??= $treatment->name;
        $attributes['transaction_item']['name'] ??= $attributes['name'];
    }

    public static function after(mixed $data): self{
        $new = static::new();
        $prop = &$data->props;
        if (isset($data->transaction_item)){
            $transaction_item = &$data->transaction_item;
            $transaction_model = $data->visit_registration_model->transaction;
            $transaction_item->transaction_id ??= $transaction_model->getKey();
            $transaction_item->reference_type ??= $transaction_model->reference_type;
            $transaction_item->reference_id ??= $transaction_model->reference_id;

            $payment_detail = &$transaction_item->payment_detail;
            $payment_detail->payment_summary_id ??= $data->visit_registration_model->paymentSummary->getKey();
        }
        return $data;
    }
}