<?php

namespace Hanafalah\ModuleExamination\Models\Examination\Assessment;

use Hanafalah\ModuleExamination\Models\Examination\Assessment\Assessment;

class AudiometriTest extends Assessment {
    protected $table        = 'assessments';
    public $response_model  = 'array';
    public $specific        = [
        "left_ears","right_ears"
    ];
}
