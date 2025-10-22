<?php

namespace Hanafalah\ModuleExamination\Models\Examination\Assessment;

class PlanNote extends Assessment {
    protected $table = 'assessments';
    public $specific = [
        'note'
    ];
}