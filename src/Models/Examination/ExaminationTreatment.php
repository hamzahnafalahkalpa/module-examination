<?php

namespace Hanafalah\ModuleExamination\Models\Examination;

use Hanafalah\ModuleExamination\Models\Examination;

class ExaminationTreatment extends Examination
{
    protected $list = [
        'id',
        'name',
        'visit_examination_id',
        'examination_summary_id',
        'patient_summary_id',
        'reference_type',
        'reference_id',
        'qty',
        'price',
        'treatment_id',
        'props'
    ];
    protected $show = [];

    protected $casts = [
        'name' => 'string'
    ];

    protected static function booted(): void
    {
        parent::booted();
        static::created(function ($query) {
            $visit_examination  = $query->visitExamination;
            $visit_registration = $visit_examination->visitRegistration;
            $transaction        = $visit_registration->visitPatient->transaction;

            //CREATE TRANSACTION ITEM
            $transaction_item = $query->transactionItem()->firstOrCreate([
                'item_id'        => $query->reference_id,
                'item_type'      => $query->reference_type,
                'item_name'      => $query->name,
                'transaction_id' => $transaction->getKey(),
            ]);

            //CREATE PAYMENT DETAIL
            $payment_summary    = $visit_registration->paymentSummary;
            $treatment          = $query->treatment;
            $qty                = $query->qty ?? 1;
            $price              = $query->price ?? $treatment->price ?? 0;
            $tax                = $treatment->tax ?? 0;
            $additional         = $treatment->additional ?? 0;
            $amount             = ($qty * $price) + $additional + $tax;
            $transaction_item->paymentDetail()->firstOrCreate([
                'payment_summary_id'  => $payment_summary->getKey(),
                'transaction_item_id' => $transaction_item->getKey()
            ], [
                'qty'                 => $qty,
                'cogs'                => $treatment->cogs ?? 0,
                'tax'                 => $tax,
                'additional'          => $additional,
                'amount'              => $amount,
                'debt'                => $amount,
                'price'               => $price
            ]);
        });
        static::deleted(function ($query) {
            if ($query->isDirty('deleted_at')) {
                $transaction_item = $query->transaction_item;
                $payment_detail   = $transaction_item->paymentDetail;
                if (!isset($payment_detail->payment_history_id)) {
                    $transaction_item->delete();
                }
            }
        });
    }

    //EIGER SECTION
    public function treatment()
    {
        return $this->belongsToModel("Treatment", 'treatment_id');
    }
    public function reference()
    {
        return $this->morphTo();
    }
    public function transactionItem()
    {
        return $this->hasOneModel('TransactionItem', 'item_id', 'reference_id')
            ->where('item_type', $this->reference_type);
    }
}
