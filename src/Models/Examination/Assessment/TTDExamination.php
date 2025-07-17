<?php

namespace Hanafalah\ModuleExamination\Models\Examination\Assessment;

use Hanafalah\ModuleExamination\Models\Examination\Assessment\Assessment;

class TTDExamination extends Assessment {
    protected $table = 'assessments';
    public $specific = [
        "year_month","week","ttd_type"
    ];
}
