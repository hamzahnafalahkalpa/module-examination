<?php

namespace Hanafalah\ModuleExamination\Models\Examination;

use Hanafalah\ModuleExamination\Models\Examination;

class Prescription extends Examination
{
    protected $list = [
        'id',
        'name',
        'pharmacy_sale_id',
        'visit_examination_id',
        'examination_summary_id',
        'patient_summary_id',
        'reference_type',
        'reference_id',
        'prescription_no',
        'iter',
        'qty',
        'cogs',
        'price',
        'indication',
        'props'
    ];
    protected $show = [];

    protected $casts = [
        'name' => 'string'
    ];

    protected static function booted(): void
    {
        parent::booted();
        // static::created(function ($query) {
        //     static::setPaymentDetail($query);
        // });
        // static::updated(function ($query) {
        //     static::setPaymentDetail($query);
        // });
        static::deleted(function ($query) {
            $transaction_item = $query->transactionItem;
            if (isset($transaction_item)) {
                $payment_detail = $transaction_item->paymentDetail;
                if ($payment_detail->amount == $payment_detail->debt) {
                    $transaction_item->delete();
                }
            }
        });
    }

    private static function setPaymentDetail($query)
    {
        $visit_examination  = $query->visitExamination;
        $visit_examination->is_has_prescription = true;
        $visit_examination->is_prescription_completed = false;
        $visit_examination->save();
        
        $visit_registration = $visit_examination->visitRegistration;
        $pharmacy_sale      = $visit_registration->visitPatient;
        if (isset($pharmacy_sale) && $visit_registration->visit_patient_type == 'PharmacySale') {
            $transaction    = $pharmacy_sale->transaction;
            //CREATE TRANSACTION ITEM
            $transaction_item = $query->transactionItem()->firstOrCreate([
                'item_id'        => $query->reference_id,
                'item_type'      => $query->reference_type,
                'item_name'      => $query->name,
                'transaction_id' => $transaction->getKey(),
            ]);
            //CREATE PAYMENT DETAIL
            $payment_summary    = $visit_registration->paymentSummary;
            $qty                = $query->qty ?? 1;
            $price              = $query->price ?? 0;
            $tax                = $query->tax ?? 0;
            $additional         = $query->additional ?? 0;
            $amount             = ($qty * $price) + $additional + $tax;
            $payment_detail     = $transaction_item->paymentDetail()->firstOrCreate([
                'payment_summary_id'  => $payment_summary->getKey(),
                'transaction_item_id' => $transaction_item->getKey()
            ], [
                'qty'                 => $qty,
                'cogs'                => $query->cogs ?? 0,
                'tax'                 => $tax,
                'additional'          => $additional,
                'amount'              => $amount,
                'debt'                => $amount,
                'price'               => $price
            ]);
            if ($payment_detail->qty != $query->qty) {
                $payment_detail->qty      = $qty;
                $add                      = $qty * $payment_detail->price;
                $payment_detail->debt     = $add;
                $payment_detail->amount   = $add;
                $payment_detail->save();
            }
        }
    }

    public function reference()
    {
        return $this->morphTo();
    }
    public function pharmacySale()
    {
        return $this->belongsToModel('PharmacySale');
    }
    public function transactionItem()
    {
        return $this->hasOneModel('TransactionItem', 'item_id', 'reference_id')
            ->where('item_type', $this->reference_type);
    }
}
