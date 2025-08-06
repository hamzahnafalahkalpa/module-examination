<?php

namespace Hanafalah\ModuleExamination\Models\Examination\Assessment;

use Hanafalah\ModuleExamination\Concerns\HasSurvey;
use Hanafalah\ModuleExamination\Models\Examination\Assessment\Assessment;

class PhysicalActivity extends Assessment {
    use HasSurvey;

    protected $table = 'assessments';
    public $specific = [
        'surveys','summary'
    ];

    protected function getSurveyFlag(): ?string {
        return 'PhysicalActivity';
    }
}
