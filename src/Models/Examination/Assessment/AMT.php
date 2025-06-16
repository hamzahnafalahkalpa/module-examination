<?php

namespace Gii\PuskesmasModuleExamination\Models\Examination\Assessment;

use Gii\PuskesmasModuleExamination\Concerns\HasSurvey;
use Illuminate\Database\Eloquent\Model;

class AMT extends Assessment{
    use HasSurvey;

    protected $table  = 'assessments';
    public $specific  = [
        'result','surveys'
    ];
}
