<?php

namespace Gii\PuskesmasModuleExamination\Models\Examination\Assessment;

use Gii\PuskesmasModuleExamination\Models\Examination\Assessment\Assessment;

class AudiometriTest extends Assessment {
    protected $table        = 'assessments';
    public $response_model  = 'array';
    public $specific        = [
        "left_ears","right_ears"
    ];
}
