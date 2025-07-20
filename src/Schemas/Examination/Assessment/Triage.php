<?php

namespace Hanafalah\ModuleExamination\Schemas\Examination\Assessment;

use Hanafalah\ModuleExamination\Contracts\Schemas\Examination\Assessment\Triage as AssessmentTriage;

class Triage extends Assessment implements AssessmentTriage
{
    protected string $__entity   = 'Triage';
    public $triage_model;
}