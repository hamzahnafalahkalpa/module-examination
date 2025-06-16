<?php

namespace Gii\PuskesmasModuleExamination\Models\Examination\Assessment;

use Gii\PuskesmasModuleExamination\Models\Examination\Assessment\Assessment;

class ThroatExamination extends Assessment {
    protected $table = 'assessments';
    //loc is level of consciousness
    public $specific = [
        "aritenoid", "stridor", "sianosis", "suara",
        "mucosa", "tonsil", "dinding_belakang"
    ];
}
