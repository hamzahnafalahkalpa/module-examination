<?php

namespace Hanafalah\ModuleExamination\Models\Examination\Assessment;

class ImmunizationHistory extends Assessment{
    protected $table  = 'assessments';
    public $response_model = 'array';
    public $specific  = [
        'immunization_id','estimate_date'
    ];
}
