<?php

namespace Hanafalah\ModuleExamination\Models\Examination\Assessment;

use Hanafalah\ModuleExamination\Concerns\HasSurvey;
use Illuminate\Database\Eloquent\Model;

class TBRiskFactor extends Assessment{
    use HasSurvey;

    protected $table  = 'assessments';
    public $specific  = [
        'surveys','date_diagnosed'
    ];

    protected function getSurveyFlag(): ?string {
        return 'TBRiskFactor';
    }
}
