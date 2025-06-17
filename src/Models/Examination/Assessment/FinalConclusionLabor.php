<?php

namespace Hanafalah\ModuleExamination\Models\Examination\Assessment;

use Hanafalah\ModuleExamination\Concerns\HasSurvey;

class FinalConclusionLabor extends Assessment{
    protected $table  = 'assessments';
    public $specific  = [
        'per_tanggal','umur_kehamilan','penolong','jenis_persalinan','keadaan_ibu','komplikasi_ibu'
    ];
}
