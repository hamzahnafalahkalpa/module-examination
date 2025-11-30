<?php

namespace Hanafalah\ModuleExamination\Data\Examination;

use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Attributes\MapName;
use Hanafalah\ModuleExamination\Contracts\Data\Examination\PrescriptionData as ExaminationPrescriptionData;
use Hanafalah\ModuleExamination\Data\ExaminationData;
use Hanafalah\ModulePayment\Contracts\Data\PosTransactionItemData;

class PrescriptionData extends ExaminationData implements ExaminationPrescriptionData
{
    #[MapName('id')]
    #[MapInputName('id')]
    public mixed $id = null;

    #[MapName('name')]
    #[MapInputName('name')]
    public string $name;

    #[MapName('pharmacy_sale_id')]
    #[MapInputName('pharmacy_sale_id')]
    public mixed $pharmacy_sale_id = null;

    #[MapName('pharmacy_sale_model')]
    #[MapInputName('pharmacy_sale_model')]
    public mixed $pharmacy_sale_model = null;

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

    #[MapName('cogs')]
    #[MapInputName('cogs')]
    public ?int $cogs = null;

    #[MapName('price')]
    #[MapInputName('price')]
    public ?int $price = null;

    #[MapName('transaction_item')]
    #[MapInputName('transaction_item')]
    public ?PosTransactionItemData $transaction_item = null;

    #[MapName('props')]
    #[MapInputName('props')]
    public ?array $props = null;

    public static function before(array &$attributes){
        $new = static::new();

        $qty = $attributes['qty']   ??= 1;
        $price = $attributes['price'] ?? 0;

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
                'amount'     => $attributes['total_price'],
                'debt'       => $attributes['total_price'],
                'cogs'       => $attributes['cogs'] ?? 0,
                'tax'        => $attributes['tax'] ?? 0,
                'additional' => $attributes['additional'] ?? 0
            ]
        ];
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