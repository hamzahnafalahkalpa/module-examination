<?php

namespace Gii\PuskesmasModuleExamination\Models\Examination\Assessment;

use Gii\PuskesmasModuleExamination\Models\Examination\Assessment\Assessment;

class TTDExamination extends Assessment {
    protected $table = 'assessments';
    public $specific = [
        "year_month","week","ttd_type"
    ];
}
