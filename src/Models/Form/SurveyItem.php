<?php

namespace Hanafalah\ModuleExamination\Models\Form;

use Hanafalah\LaravelHasProps\Concerns\HasProps;
use Hanafalah\LaravelSupport\Models\BaseModel;

class SurveyItem extends BaseModel
{
    use HasProps;

    protected $list       = ['id', 'form_id', 'name', 'ordering', 'props'];
    protected $show       = [];

    public function form()
    {
        return $this->belongsToModel('Form');
    }
}
