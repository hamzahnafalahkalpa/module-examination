<?php

namespace Hanafalah\ModuleExamination\Models\Examination\Assessment;

use Hanafalah\ModuleExamination\Concerns\HasSurvey;
use Illuminate\Database\Eloquent\Model;

class HIV extends Assessment{
    use HasSurvey;

    protected $table  = 'assessments';
    public $specific  = [
        'surveys'
    ];

    protected function getSurveyFlag(): ?string {
        return 'HIV';
    }
}
