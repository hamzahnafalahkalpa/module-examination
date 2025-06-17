<?php

namespace Hanafalah\ModuleExamination\Models\Examination\Assessment;

use Hanafalah\ModuleExamination\Models\Examination\Assessment\Assessment;

class MorceFallScale extends Assessment {
    protected $table = 'assessments';
    public $specific = [
        "riwayat_jatuh","intravenous_therapy_heparin_lock","mental_status","secondary_diagnose","grait","ambulatory_aid","resume"
    ];
}
