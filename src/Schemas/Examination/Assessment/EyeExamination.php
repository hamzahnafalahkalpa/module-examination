<?php

namespace Hanafalah\ModuleExamination\Schemas\Examination\Assessment;

use Hanafalah\ModuleExamination\Contracts\Schemas\Examination\Assessment\EyeExamination as AssessmentEyeExamination;

class EyeExamination extends Assessment implements AssessmentEyeExamination
{
    protected string $__entity   = 'EyeExamination';
    public $EyeExaminationModel;
}
