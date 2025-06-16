<?php

namespace Gii\PuskesmasModuleExamination\Models\Examination\Assessment;

use Gii\PuskesmasModuleExamination\Concerns\HasSurvey;

class GDS4 extends Assessment{
    use HasSurvey;

    protected $table  = 'assessments';
    public $specific  = [
        'surveys'
    ];
}
