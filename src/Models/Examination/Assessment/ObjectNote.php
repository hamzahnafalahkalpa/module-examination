<?php

namespace Hanafalah\ModuleExamination\Models\Examination\Assessment;

class ObjectNote extends Assessment {
    protected $table = 'assessments';
    public $specific = [
        'note'
    ];
}