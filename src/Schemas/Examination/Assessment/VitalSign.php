<?php

namespace Hanafalah\ModuleExamination\Schemas\Examination\Assessment;

use Hanafalah\ModuleExamination\Contracts\Examination\Assessment\VitalSign as AssessmentVitalSign;
use Hanafalah\ModuleExamination\Schemas\Examination\Assessment\Assessment;

class VitalSign extends Assessment implements AssessmentVitalSign
{
    protected string $__entity   = 'VitalSign';
}
