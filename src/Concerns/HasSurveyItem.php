<?php

namespace Gii\ModuleExamination\Concerns;

trait HasSurveyItem{
    public function surveyItems(){
        return $this->hasManyModel('SurveyItem','form_id')->orderBy('ordering','asc');
    }
}