<?php

namespace Hanafalah\ModuleExamination\Concerns;

trait HasExaminationSummary
{
    public static function bootHasExaminationSummary()
    {
        static::created(function ($model) {
            $model->examinationSummary()->firstOrCreate();
        });
    }

    public function examinationSummary()
    {
        return $this->morphOneModel('ExaminationSummary', 'reference');
    }
}
