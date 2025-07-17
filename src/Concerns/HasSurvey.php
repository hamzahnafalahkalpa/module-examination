<?php

namespace Hanafalah\ModuleExamination\Concerns;

use Illuminate\Database\Eloquent\Model;

trait HasSurvey {
    protected function getSurveyKey(): string{
        return 'surveys';
    }

    protected function getSurveyFlag(): ?string {
        return $this->getMorphClass();
    }

    public function getSurveyByFlag(? string $flag = null): Model{
        $flag ??= $this->getSurveyFlag();
        return $this->MasterSurveyModel()->flagIn($flag)->first();
    }

    protected function getSurveys(): array {
        $flag = $this->getSurveyFlag();
        if (isset($flag)){
            $master_survey = $this->getSurveyByFlag($flag);
            $surveys       = $master_survey->dynamic_forms;
        }
        return $surveys ?? [];
    }

    public function getAfterResolve(): Model{
        $survey_name   = $this->getSurveyKey();
        $dynamic_forms = $this->{$survey_name};
        $new_surveys   = $this->getSurveyByFlag()->dynamic_forms;
        foreach ($dynamic_forms as $dynamic_form) {
            if (isset($dynamic_form[$dynamic_form['key']],$dynamic_form[$dynamic_form['key']]['value'])){
                $new_surveys[$dynamic_form['key']]['value'] = $dynamic_form[$dynamic_form['key']];
            }
        }
        $this->setAttribute($survey_name,$new_surveys);
        $this->save();
        return $this;
    }
}