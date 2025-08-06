<?php

namespace Hanafalah\ModuleExamination\Models\Examination\Assessment;

use Hanafalah\ModuleExamination\Concerns\HasSurvey;
use Hanafalah\ModuleExamination\Models\Examination\Assessment\Assessment;

class NeonatalEsensial extends Assessment {
    use HasSurvey;

    protected $table = 'assessments';
    public $specific = [
        'surveys'
    ];

    protected function getSurveyFlag(): ?string {
        return 'NeonatalEsensial';
    }
}
