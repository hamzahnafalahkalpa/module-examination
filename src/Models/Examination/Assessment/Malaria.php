<?php

namespace Hanafalah\ModuleExamination\Models\Examination\Assessment;

use Hanafalah\ModuleExamination\Concerns\HasSurvey;

class Malaria extends Assessment{
    use HasSurvey;

    protected $table  = 'assessments';
    public $specific  = [
        'surveys'
    ];

    protected function getSurveyFlag(): ?string {
        return 'Malaria';
    }

}