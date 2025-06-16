<?php

namespace Gii\PuskesmasModuleExamination\Models\Examination\Assessment;

class ImmunizationHistory extends Assessment{
    protected $table  = 'assessments';
    public $response_model = 'array';
    public $specific  = [
        'immunization','date'
    ];
}
