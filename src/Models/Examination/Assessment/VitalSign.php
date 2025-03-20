<?php

namespace Gii\ModuleExamination\Models\Examination\Assessment;

use Gii\ModuleExamination\Models\Examination\Assessment\Assessment;

class VitalSign extends Assessment {
    protected $table = 'assessments';
    //loc is level of consciousness
    public $specific = [
        'temperature', 'temperature_type', 
        'systolic', 'diastolic',
        'pulse_rate', 'heart_rate', 'respiration_rate', 
        'oxygen_saturation','sars_cov2_rt', 
        'loc' 
    ];
    
    public function getTemperatureTypes(){
        return [
            'ARMPIT', 'EAR', 'INFRARED', 'ORAL', 'RECTAL'
        ];
    }

}