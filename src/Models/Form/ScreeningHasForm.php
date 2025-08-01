<?php

namespace Hanafalah\ModuleExamination\Models\Form;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Hanafalah\LaravelHasProps\Concerns\HasProps;
use Hanafalah\LaravelSupport\Models\BaseModel;
use Hanafalah\ModuleExamination\Resources\ScreeningHasForm\{ViewScreeningHasForm,ShowScreeningHasForm};

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

    public function getViewResource(){return ViewScreeningHasForm::class;}
    public function getShowResource(){return ShowScreeningHasForm::class;}

    public function form(){return $this->belongsToModel('Form');}
    public function screening(){return $this->belongsToModel('Screening');}
}
