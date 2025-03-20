<?php

namespace Gii\ModuleExamination\Schemas\Examination\Assessment;

use Gii\ModuleExamination\Contracts\Examination\Assessment\Allergy as AssessmentAllergy;

class Allergy extends Assessment implements AssessmentAllergy {
    protected string $__entity   = 'Allergy';
    public static $allergy_model;
}