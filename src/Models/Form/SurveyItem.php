<?php

namespace Gii\ModuleExamination\Models\Form;

use Zahzah\LaravelHasProps\Concerns\HasProps;
use Zahzah\LaravelSupport\Models\BaseModel;

class SurveyItem extends BaseModel{
    use HasProps;

    protected $list       = ['id', 'form_id', 'name', 'ordering', 'props'];
    protected $show       = [];

    public function form(){return $this->belongsToModel('Form');}
}