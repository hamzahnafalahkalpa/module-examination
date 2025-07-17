<?php

namespace Hanafalah\ModuleExamination\Schemas\Examination\Assessment;

use Hanafalah\ModuleExamination\Contracts\Schemas\Examination\Assessment\EyeRefractionExamination as AssessmentEyeRefractionExamination;

class EyeRefractionExamination extends Assessment implements AssessmentEyeRefractionExamination
{
    protected string $__entity   = 'EyeRefractionExamination';
    public static $EyeRefractionExaminationModel;
}
