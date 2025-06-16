<?php

namespace Gii\PuskesmasModuleExamination\Models\Examination\Assessment;

use Gii\PuskesmasModuleExamination\Models\Examination\Assessment\Assessment;

class LarynxExamination extends Assessment {
    protected $table = 'assessments';
    public $specific = [
        "epiglotis", "aritenoid", "plika_ventrikularis",
        "endoskopi","plika_vokalis", "rimaglotis"
    ];    
}
