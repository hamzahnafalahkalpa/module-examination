<?php

namespace Gii\ModuleExamination\Models\Form;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Zahzah\LaravelHasProps\Concerns\HasProps;
use Zahzah\LaravelSupport\Models\BaseModel;
use Zahzah\MicroTenant\Concerns\Models\TenantConnection;

class ScreeningHasForm extends BaseModel{
    use HasUlids, HasProps;

    public $incrementing  = false;
    protected $keyType    = 'string';
    protected $primaryKey = 'id';
    protected $list       = [
        'id', 'form_id', 'screening_id', 'props'
    ];

    public function form(){return $this->belongsToModel('Form');}
    public function screening(){return $this->belongsToModel('Screening');}
}
