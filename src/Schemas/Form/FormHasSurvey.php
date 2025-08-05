<?php

namespace Hanafalah\ModuleExamination\Schemas\Form;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Hanafalah\ModuleExamination\{
    Supports\BaseModuleExamination
};
use Hanafalah\ModuleExamination\Contracts\Schemas\Form\FormHasSurvey as ContractsFormHasSurvey;
use Hanafalah\ModuleExamination\Contracts\Data\Form\FormHasSurveyData;

class FormHasSurvey extends BaseModuleExamination implements ContractsFormHasSurvey
{
    protected string $__entity = 'FormHasSurvey';
    public $form_has_survey_model;
    //protected mixed $__order_by_created_at = false; //asc, desc, false

    protected array $__cache = [
        'index' => [
            'name'     => 'form_has_survey',
            'tags'     => ['form_has_survey', 'form_has_survey-index'],
            'duration' => 24 * 60
        ]
    ];

    public function prepareStoreFormHasSurvey(FormHasSurveyData $form_has_survey_dto): Model{
        if (isset($form_has_survey_dto->survey)){
            $survey_dto = &$form_has_survey_dto->survey;
            $survey_model = $this->schemaContract('survey')->prepareStoreSurvey($survey_dto);
            $form_has_survey_dto->survey_id = $survey_model->id;
            $form_has_survey_dto->props['prop_survey'] = $survey_model->toViewApi()->resolve();
        }

        $guard = [
            'form_id'   => $form_has_survey_dto->form_id,
            'survey_id' => $form_has_survey_dto->survey_id,
        ];
        $form_has_survey = $this->usingEntity()->updateOrCreate($guard);

        $this->fillingProps($form_has_survey,$form_has_survey_dto->props);
        $form_has_survey->save();
        return $this->form_has_survey_model = $form_has_survey;
    }
}