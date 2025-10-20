<?php

namespace Hanafalah\ModuleExamination\Models\Examination\Assessment;

use Hanafalah\ModuleExamination\Concerns\HasSurvey;

class TetanusImmunization extends Assessment{
    use HasSurvey;

    protected $table  = 'assessments';
    public $specific  = [
        'tetanus_date_1',
        'tetanus_date_2',
        'tetanus_date_3',
        'tetanus_date_4',
        'tetanus_date_5'
    ];
}
