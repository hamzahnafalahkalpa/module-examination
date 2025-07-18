<?php

namespace Hanafalah\ModuleExamination\Schemas\Form;

use Hanafalah\ModuleExamination\Contracts\Schemas\Form\MasterSurvey as ContractsMasterSurvey;
use Hanafalah\ModuleExamination\Schemas\ExaminationStuff;

class MasterSurvey extends ExaminationStuff implements ContractsMasterSurvey
{
    protected string $__entity = 'MasterSurvey';
    public static $master_survey_model;
    //protected mixed $__order_by_created_at = false; //asc, desc, false

    protected array $__cache = [
        'index' => [
            'name'     => 'master_survey',
            'tags'     => ['master_survey', 'master_survey-index'],
            'duration' => 24 * 60
        ]
    ];
}