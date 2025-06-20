<?php

namespace Hanafalah\ModuleExamination\Schemas\Examination\Assessment;

use Hanafalah\ModuleExamination\Contracts\Schemas\Examination\Assessment\Vaccine as AssessmentVaccine;
use Illuminate\Database\Eloquent\Model;

class Vaccine extends Assessment implements AssessmentVaccine
{
    protected string $__entity   = 'Vaccine';
    public static $vaccine_model;

    public function prepareStore(?array $attributes = null): Model
    {
        $attributes ??= request()->all();
        $assessment = parent::prepareStore($attributes);
        $attributes['is_lifetime'] = filter_var($attributes['is_lifetime'] ?? false, FILTER_VALIDATE_BOOLEAN);
        $assessment->certificate_valid_range = $attributes['certificate_valid_range'] ?? null;
        if (isset($assessment->certificate_valid_range)) {
            $assessment->certificate_valid_range = intval($assessment->certificate_valid_range);
            $attributes['valid_until'] = now()->addYears($assessment->certificate_valid_range);
        }
        $assessment->valid_until = $attributes['valid_until'] ?? null;
        $assessment->name = $assessment->vaccine['name'];
        $assessment->save();
        return static::$assessment_model = $assessment;
    }
}
