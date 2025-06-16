<?php

namespace Gii\PuskesmasModuleExamination\Models\Examination\Assessment;

use Gii\PuskesmasModuleExamination\Models\Examination\Assessment\Assessment;

class MorceFallScale extends Assessment {
    protected $table = 'assessments';
    public $specific = [
        "riwayat_jatuh","intravenous_therapy_heparin_lock","mental_status","secondary_diagnose","grait","ambulatory_aid","resume"
    ];
}
