<?php

namespace Gii\PuskesmasModuleExamination\Models\Examination\Assessment;

use Gii\PuskesmasModuleExamination\Concerns\HasSurvey;

class KalaIVExamination extends Assessment{
    protected $table  = 'assessments';
    public $specific  = [
        'histories','problem','problem_management','result'
    ];
    public function setHistory(array $histories){
        $this->histories[] = [
            'hour_type'         => $histories['hour_type'],
            'hour'              => $histories['hour'],
            'pulse_rate'        => $histories['pulse_rate'],
            'temperature'       => $histories['temperature'],
            'fundus_height'     => $histories['fundus_height'],
            'contracted_uterus' => $histories['contracted_uterus'],
            'womb'              => $histories['womb'],
            'bleeding'          => $histories['bleeding']
        ];
    }
}
