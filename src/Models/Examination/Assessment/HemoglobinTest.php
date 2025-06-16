<?php

namespace Gii\PuskesmasModuleExamination\Models\Examination\Assessment;

use Gii\PuskesmasModuleExamination\Models\Examination\Assessment\Assessment;

class HemoglobinTest extends Assessment {
    protected $table = 'assessments';
    public $specific = [
        "score","resume"
    ];
}
