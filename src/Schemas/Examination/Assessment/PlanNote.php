<?php

namespace Hanafalah\ModuleExamination\Schemas\Examination\Assessment;

use Hanafalah\ModuleExamination\Contracts\Schemas\Examination\Assessment\PlanNote as AssessmentPlanNote;

class PlanNote extends Assessment implements AssessmentPlanNote
{
    protected string $__entity   = 'PlanNote';
    public $plan_note_model;
}
