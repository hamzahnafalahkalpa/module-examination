<?php

namespace Hanafalah\ModuleExamination\Schemas\Examination\Assessment;

use Hanafalah\ModuleExamination\Contracts\Schemas\Examination\Assessment\Allergy as AssessmentAllergy;

class Allergy extends Assessment implements AssessmentAllergy
{
    protected string $__entity   = 'Allergy';
    public static $allergy_model;
}
