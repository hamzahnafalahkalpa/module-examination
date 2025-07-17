<?php

namespace Hanafalah\ModuleExamination\Models\Examination\Assessment;

use Hanafalah\ModuleExamination\Concerns\HasSurvey;

class GDS4 extends Assessment{
    use HasSurvey;

    protected $table  = 'assessments';
    public $specific  = [
        'surveys'
    ];
}
