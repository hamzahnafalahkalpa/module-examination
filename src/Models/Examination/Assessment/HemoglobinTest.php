<?php

namespace Hanafalah\ModuleExamination\Models\Examination\Assessment;

use Hanafalah\ModuleExamination\Models\Examination\Assessment\Assessment;

class HemoglobinTest extends Assessment {
    protected $table = 'assessments';
    public $specific = [
        "score","resume"
    ];
}
