<?php

namespace Hanafalah\ModuleExamination\Schemas\Form;

use Hanafalah\ModuleExamination\Contracts\Schemas\Form\Survey as ContractsSurvey;

class Survey extends Form implements ContractsSurvey
{
    protected string $__entity = 'Survey';
    public $survey_model;
    //protected mixed $__order_by_created_at = false; //asc, desc, false

    protected array $__cache = [
        'index' => [
            'name'     => 'survey',
            'tags'     => ['survey', 'survey-index'],
            'duration' => 24 * 60
        ]
    ];
}