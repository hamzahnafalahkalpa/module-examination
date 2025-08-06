<?php

namespace Hanafalah\ModuleExamination\Models\Examination\Assessment;

use Hanafalah\ModuleExamination\Concerns\HasSurvey;

class Partus extends Assessment{
    use HasSurvey;

    protected $table  = 'assessments';
    public $specific  = [
        'surveys'
    ];
}
