<?php

namespace Hanafalah\ModuleExamination\Models\Examination\Assessment;

class SOAP extends Assessment {
    protected $table = 'assessments';
    public $response_model   = 'array';
    public $specific = ['subjective','objectives','assessment', 'plannings','date_time'];

}
