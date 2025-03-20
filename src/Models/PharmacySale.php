<?php

namespace Gii\ModuleExamination\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\SoftDeletes;
use Zahzah\LaravelHasProps\Concerns\HasProps;
use Zahzah\LaravelSupport\Models\BaseModel;
use Zahzah\LaravelSupport\Concerns\Support\HasActivity;
use Zahzah\ModuleTransaction\Concerns\HasTransaction;

class PharmacySale extends BaseModel {
    use HasUlids, HasTransaction, SoftDeletes, HasProps, HasActivity;

    public $incrementing  = false;
    protected $keyType    = 'string';
    protected $primaryKey = 'id';
    protected $list       = [
        'id','pharmacy_sale_code','patient_id','reservation_id',
        'queue_number','visited_at','status','props'
    ];
    protected $show       = [];
}
