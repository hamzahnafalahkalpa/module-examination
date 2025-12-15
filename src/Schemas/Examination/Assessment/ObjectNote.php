<?php

namespace Hanafalah\ModuleExamination\Schemas\Examination\Assessment;

use Hanafalah\ModuleExamination\Contracts\Schemas\Examination\Assessment\ObjectNote as AssessmentObjectNote;

class ObjectNote extends Assessment implements AssessmentObjectNote
{
    protected string $__entity   = 'ObjectNote';
    public $object_note_model;
}
