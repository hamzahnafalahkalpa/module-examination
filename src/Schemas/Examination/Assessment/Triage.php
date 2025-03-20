<?php

namespace Gii\ModuleExamination\Schemas\Examination\Assessment;

use Gii\ModuleExamination\Contracts\Examination\Assessment\Triage as AssessmentTriage;

class Triage extends Assessment implements AssessmentTriage {
    protected string $__entity   = 'Triage';
    public static $triage_model;
}