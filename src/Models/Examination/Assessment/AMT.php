<?php

namespace Hanafalah\ModuleExamination\Models\Examination\Assessment;

use Hanafalah\ModuleExamination\Concerns\HasSurvey;
use Illuminate\Database\Eloquent\Model;

class AMT extends Assessment{
    use HasSurvey;

    protected $table  = 'assessments';
    public $specific  = [
        'result','surveys'
    ];
}
