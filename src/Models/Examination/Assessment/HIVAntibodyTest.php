<?php

namespace Hanafalah\ModuleExamination\Models\Examination\Assessment;

class HIVAntibodyTest extends Assessment{
    protected $table  = 'assessments';
    public $response_model = 'array';
    public $specific  = [
        'date','type_test','ordering_test','result_test','reagen_name'
    ];
}
