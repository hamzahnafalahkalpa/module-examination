<?php

namespace Hanafalah\ModuleExamination\Models\Examination\Assessment;

use Hanafalah\ModuleExamination\Concerns\HasSurvey;
use Illuminate\Database\Eloquent\Model;

class PostpartumObservation extends Assessment{
    use HasSurvey;

    protected $table  = 'assessments';
    public $specific  = [
        'persalinan','bab','bak','keadaan_ibu','keadaan_bayi','komplikasi_nifas','surveys'
    ];

    public function getExams(mixed $default = null,? array $vars = null): array{
        $exams = parent::getExams();
        if ($exams['exam']['komplikasi_nifas'] == []) $exams['exam']['komplikasi_nifas'] = null;
        return $exams;
    }

    protected function getSurveyFlag(): ?string {
        return 'PostpartumObservation';
    }
}
