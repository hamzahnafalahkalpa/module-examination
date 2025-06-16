<?php

namespace Gii\PuskesmasModuleExamination\Models\Examination\Assessment;

use Gii\PuskesmasModuleExamination\Models\Examination\Assessment\Assessment;

class PhysicalActivity extends Assessment {
    protected $table = 'assessments';
    public $specific = [
        "makan_minum","toileting","mandi","berpakaian","mobilisasi","skor","note"
    ];
}
