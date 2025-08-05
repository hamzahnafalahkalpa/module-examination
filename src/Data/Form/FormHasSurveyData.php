<?php

namespace Hanafalah\ModuleExamination\Data\Form;

use Hanafalah\LaravelSupport\Supports\Data;
use Hanafalah\ModuleExamination\Contracts\Data\Form\FormHasSurveyData as DataFormHasSurveyData;
use Hanafalah\ModuleExamination\Contracts\Data\Form\SurveyData;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Attributes\MapName;

class FormHasSurveyData extends Data implements DataFormHasSurveyData
{
    #[MapInputName('id')]
    #[MapName('id')]
    public mixed $id = null;

    #[MapInputName('form_id')]
    #[MapName('form_id')]
    public mixed $form_id = null;

    #[MapInputName('survey_id')]
    #[MapName('survey_id')]
    public mixed $survey_id;

    #[MapInputName('survey')]
    #[MapName('survey')]
    public ?SurveyData $survey = null;
    
    #[MapInputName('props')]
    #[MapName('props')]
    public ?array $props = null;
}