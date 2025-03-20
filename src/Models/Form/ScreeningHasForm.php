<?php

namespace Hanafalah\ModuleExamination\Models\Form;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Hanafalah\LaravelHasProps\Concerns\HasProps;
use Hanafalah\LaravelSupport\Models\BaseModel;
use Hanafalah\MicroTenant\Concerns\Models\TenantConnection;

class ScreeningHasForm extends BaseModel
{
    use HasUlids, HasProps;

    public $incrementing  = false;
    protected $keyType    = 'string';
    protected $primaryKey = 'id';
    protected $list       = [
        'id',
        'form_id',
        'screening_id',
        'props'
    ];

    public function form()
    {
        return $this->belongsToModel('Form');
    }
    public function screening()
    {
        return $this->belongsToModel('Screening');
    }
}
