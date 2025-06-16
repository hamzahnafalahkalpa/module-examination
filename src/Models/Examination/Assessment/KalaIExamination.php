<?php

namespace Gii\PuskesmasModuleExamination\Models\Examination\Assessment;

use Gii\PuskesmasModuleExamination\Concerns\HasSurvey;

class KalaIExamination extends Assessment{

    protected $table  = 'assessments';
    public $specific  = [
        'partogram_melewati_garis_waspada','masalah_lain','penatalaksanaan_masalah','hasil'
    ];
}
