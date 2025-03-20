<?php

namespace Gii\ModuleExamination\Schemas\Examination\Assessment;

use Gii\ModuleExamination\Contracts\Examination\Assessment\VitalSign as AssessmentVitalSign;
use Gii\ModuleExamination\Schemas\Examination\Assessment\Assessment;

class VitalSign extends Assessment implements AssessmentVitalSign{
    protected string $__entity   = 'VitalSign';
}