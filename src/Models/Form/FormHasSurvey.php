<?php

namespace Hanafalah\ModuleExamination\Models\Form;

use Hanafalah\LaravelHasProps\Concerns\HasProps;
use Hanafalah\LaravelSupport\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;
use Hanafalah\ModuleExamination\Resources\FormHasSurvey\{
    ViewFormHasSurvey,
    ShowFormHasSurvey
};
use Illuminate\Database\Eloquent\Concerns\HasUlids;

class FormHasSurvey extends BaseModel
{
    use HasUlids, HasProps, SoftDeletes;
    
    public $incrementing  = false;
    protected $keyType    = 'string';
    protected $primaryKey = 'id';
    public $list = [
        'id',
        'form_id',
        'survey_id',
        'props',
    ];

    protected $casts = [
        'name' => 'string',
        'survey_name' => 'string'
    ];

    public function getPropsQuery(): array{
        return [
            'survey_name' => 'props->prop_survey->name'
        ];
    }

    public function viewUsingRelation(): array{
        return [];
    }

    public function showUsingRelation(): array{
        return [];
    }

    public function getViewResource(){
        return ViewFormHasSurvey::class;
    }

    public function getShowResource(){
        return ShowFormHasSurvey::class;
    }

    public function survey(){return $this->belongsToModel('Survey');}    
    public function form(){return $this->belongsToModel('Form');}    
}
