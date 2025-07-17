<?php

namespace Hanafalah\ModuleExamination\Models\Examination\Assessment;

use Hanafalah\ModuleExamination\Concerns\HasSurvey;

class KalaIExamination extends Assessment{

    protected $table  = 'assessments';
    public $specific  = [
        'partogram_melewati_garis_waspada','masalah_lain','penatalaksanaan_masalah','hasil'
    ];
}
