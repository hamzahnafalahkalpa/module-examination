<?php

namespace Hanafalah\ModuleExamination\Models\Examination\Assessment;

class POPMHistory extends Assessment{
    protected $table  = 'assessments';
    public $response_model = 'array';
    public $specific  = [
        'date'
    ];
}
