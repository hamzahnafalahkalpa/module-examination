<?php

namespace Hanafalah\ModuleExamination\Models\Examination\Assessment;

class SubjectNote extends Assessment {
    protected $table = 'assessments';
    public $specific = [
        'note'
    ];
}