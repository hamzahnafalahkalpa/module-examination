<?php

namespace Hanafalah\ModuleExamination\Models\Examination\Assessment;

use Hanafalah\ModuleExamination\Concerns\HasSurvey;

class KalaIIExamination extends Assessment{

    protected $table  = 'assessments';
    public $specific  = [
        'opisiotomi','indikasi_opisiotomi','pendamping_kehamilan','conditions','masalah_lain','penatalaksanaan_masalah_lain','resume',
    ];
    public function setConditions(array $conditions){
        $this->conditions[] = [
            'condition_type'        => $conditions['condition_type'],
            'condition_result'      => $conditions['condition_result'],
            'condition_note'        => $conditions['condition_note']
        ];
    }
}
