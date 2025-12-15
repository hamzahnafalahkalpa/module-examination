<?php

namespace Hanafalah\ModuleExamination\Schemas\Examination\Assessment;

use Hanafalah\ModuleExamination\Contracts\Schemas\Examination\Assessment\AssessmentNote as AssessmentAssessmentNote;

class AssessmentNote extends Assessment implements AssessmentAssessmentNote
{
    protected string $__entity   = 'AssessmentNote';
    public $assessment_note_model;
}
