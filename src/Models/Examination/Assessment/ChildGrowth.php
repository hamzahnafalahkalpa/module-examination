<?php

namespace Hanafalah\ModuleExamination\Models\Examination\Assessment;

use Hanafalah\ModuleExamination\Concerns\HasSurvey;

class ChildGrowth extends Assessment{
    use HasSurvey;
    
    protected $table  = 'assessments';
    public $specific  = [
        'surveys'
    ];

    protected function getSurveyFlag(): ?string {
        return 'ChildGrowth';
    }
}
