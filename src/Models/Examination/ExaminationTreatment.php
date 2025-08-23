<?php

namespace Hanafalah\ModuleExamination\Models\Examination;

use Hanafalah\ModuleExamination\Models\Examination;
use Hanafalah\ModuleExamination\Resources\Examination\ExaminationTreatment\{
    ViewExaminationTreatment, ShowExaminationTreatment
};

class ExaminationTreatment extends Examination
{
    protected $list = [
        'id','name',
        'visit_examination_id',
        'examination_summary_id',
        'patient_summary_id',
        'reference_type',
        'reference_id',
        'qty','price',
        'treatment_id','props'
    ];
    protected $show = [];

    protected $casts = [
        'name' => 'string',
        'visit_examination_id' => 'string',
        'patient_summary_id' => 'string',
        'reference_type' => 'string',
        'reference_id' => 'string',
        'treatment_id' => 'string',
    ];

    protected static function booted(): void{
        parent::booted();
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

    public function getViewResource(){
        return ViewExaminationTreatment::class;
    }

    public function getShowResource(){
        return ShowExaminationTreatment::class;
    }

    //EIGER SECTION
    public function treatment(){return $this->belongsToModel("Treatment", 'treatment_id');}
    public function reference(){return $this->morphTo();}
    public function transactionItem(){return $this->hasOneModel('TransactionItem', 'item_id', 'reference_id')->where('item_type', $this->reference_type);}
}
