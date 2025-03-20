<?php

namespace Gii\ModuleExamination\Models\Examination\Assessment;

use Gii\ModuleExamination\Models\Examination\Assessment\Assessment;

class ThroatExamination extends Assessment {
    protected $table = 'assessments';
    //loc is level of consciousness
    public $specific = [
        "aritenoid", "stridor", "sianosis", "suara",
        "mucosa", "tonsil", "dinding_belakang"
    ];
}
