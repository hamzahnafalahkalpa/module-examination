<?php

namespace Hanafalah\ModuleExamination\Data\Form;

use Hanafalah\ModuleExamination\Contracts\Data\Form\SurveyData as DataSurveyData;
use Hanafalah\ModuleExamination\Data\Form\FormData;

class SurveyData extends FormData implements DataSurveyData
{
    public static function before(array &$attributes){
        $attributes['flag'] ??= 'Survey';
        parent::before($attributes);
    }
}