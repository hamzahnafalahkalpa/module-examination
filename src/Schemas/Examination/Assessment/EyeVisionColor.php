<?php

namespace Hanafalah\ModuleExamination\Schemas\Examination\Assessment;

use Hanafalah\ModuleExamination\Contracts\Examination\Assessment\EyeVisionColor as AssessmentEyeVisionColor;

class EyeVisionColor extends Assessment implements AssessmentEyeVisionColor
{
    protected string $__entity   = 'EyeVisionColor';
    public static $EyeVisionColorModel;
}
