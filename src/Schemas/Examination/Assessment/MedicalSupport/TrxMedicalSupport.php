<?php

namespace Hanafalah\ModuleExamination\Schemas\Examination\Assessment\MedicalSupport;

use Hanafalah\ModuleExamination\Contracts\Schemas\Examination\Assessment\MedicalSupport\TrxMedicalSupport as ContractsTrxMedicalSupport;
use Hanafalah\ModuleExamination\Schemas\Examination\Assessment\Assessment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class TrxMedicalSupport extends Assessment implements ContractsTrxMedicalSupport
{
    protected string $__entity = 'TrxMedicalSupport';

    public function prepareStore(?array $attributes = null): Model
    {
        $attributes ??= request()->all();
        $this->prepareStoreAssessment($attributes);
        if (isset($attributes['files']) && count($attributes['files']) > 0) {
            $attributes = $this->storePdf($attributes, Str::snake(class_basename($this)));
        }
        $this->setAssessmentProp($attributes);
        static::$assessment_model->save();

        return static::$assessment_model;
    }
}
