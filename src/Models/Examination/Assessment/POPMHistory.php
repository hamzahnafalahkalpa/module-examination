<?php

namespace Hanafalah\ModuleExamination\Models\Examination\Assessment;

//Pemberian obat pencegahan massal cacingan
class POPMHistory extends Assessment{
    protected $table  = 'assessments';
    public $response_model = 'array';
    public $specific  = [
        'date'
    ];
}
