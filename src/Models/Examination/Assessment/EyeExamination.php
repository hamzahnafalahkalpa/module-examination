<?php

namespace Hanafalah\ModuleExamination\Models\Examination\Assessment;

use Hanafalah\ModuleExamination\Models\Examination\Assessment\Assessment;

class EyeExamination extends Assessment {
    protected $table = 'assessments';

    public $specific = [
        'visus', 'skelera','konjungtiva', 'palpebra', 'kesegarisan', 'kornea',
        'bilik_mata_depan', 'iris', 'pupil','lensa','vitreous_humor',
        'funduskopi', 'tanometri', 'anel', 'persepsi_warna'
    ];

    public function getExams(mixed $default = null,? array $vars = null): array{
        return parent::getExams(['od' => null, 'os' => null]);
    }
}
