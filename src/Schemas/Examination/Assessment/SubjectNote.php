<?php

namespace Hanafalah\ModuleExamination\Schemas\Examination\Assessment;

use Hanafalah\ModuleExamination\Contracts\Schemas\Examination\Assessment\SubjectNote as AssessmentSubjectNote;

class SubjectNote extends Assessment implements AssessmentSubjectNote
{
    protected string $__entity   = 'SubjectNote';
    public $subject_note_model;
}
