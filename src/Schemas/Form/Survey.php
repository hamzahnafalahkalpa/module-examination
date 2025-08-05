<?php

namespace Hanafalah\ModuleExamination\Schemas\Form;

use Hanafalah\ModuleExamination\Contracts\Data\Form\SurveyData;
use Hanafalah\ModuleExamination\Contracts\Schemas\Form\Survey as ContractsSurvey;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

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

    public function prepareStoreSurvey(SurveyData $survey_dto): Model{
        $survey = $this->prepareStoreForm($survey_dto);
        $this->fillingProps($survey,$survey_dto->props);
        $survey->save();
        return $this->survey_model = $survey;
    }

    public function survey(mixed $conditionals = null): Builder{
        return $this->form($conditionals);
    }
}