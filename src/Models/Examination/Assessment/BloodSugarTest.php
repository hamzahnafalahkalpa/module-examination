<?php

namespace Gii\PuskesmasModuleExamination\Models\Examination\Assessment;

use Gii\PuskesmasModuleExamination\Models\Examination\Assessment\Assessment;

class BloodSugarTest extends Assessment {
    protected $table = 'assessments';
    public $specific = [
        "gula_darah_sewaktu","gula_darah_puasa","gula_darah_2_jam_pp","hba1c"
    ];
}
