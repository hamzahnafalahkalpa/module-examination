<?php

namespace Hanafalah\ModuleExamination\Models\Examination\Assessment;

use Hanafalah\ModuleExamination\Models\Examination\Assessment\Assessment;

class PhysicalActivity extends Assessment {
    protected $table = 'assessments';
    public $specific = [
        "makan_minum","toileting","mandi","berpakaian","mobilisasi","skor","note"
    ];
}
