<?php

namespace Gii\ModuleExamination\Models\Examination\Assessment;

use Gii\ModuleExamination\Models\Examination\Assessment\Assessment;

class Vaccine extends Assessment {
    protected $table       = 'assessments';
    public $response_model = 'array';
    public $specific = [
        'name','treatment_id','certificate_valid_range',
        'valid_until','is_lifetime', 'batch_number', 'vaccine_type', 'vaccine'
    ];
}