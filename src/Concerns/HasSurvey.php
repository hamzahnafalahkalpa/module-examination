<?php

namespace Hanafalah\ModuleExamination\Concerns;

use Illuminate\Database\Eloquent\Model;

trait HasSurvey {
    protected function getSurveyKey(): string{
        return 'surveys';
    }

    protected function getFl(): string{
        return 'surveys';
    }

    protected function getSurveyFlag(): ?string {
        return $this->getMorphClass();
    }

    public function getSurveyByFlag(? string $flag = null): Model{
        $flag ??= $this->getSurveyFlag();
        return $this->SurveyModel()->where('label',$flag)->first();
    }

    protected function getSurveys(): array {
        $flag = $this->getSurveyFlag();
        if (isset($flag)){
            $master_survey = $this->getSurveyByFlag($flag);
            $surveys       = $master_survey->dynamic_forms;
        }
        return $surveys ?? [];
    }
}