<?php

namespace Gii\PuskesmasModuleExamination\Models\Examination\Assessment;

use Gii\PuskesmasModuleExamination\Models\Examination\Assessment\Assessment;

class NoseExamination extends Assessment {
    protected $table = 'assessments';
    public $specific = [
        "hidung_luar", "kavum_nasi", "septum", "discharge", "mukosa",
        "tumor", "konka", "sinus", "koana", "naso_endoskopi"
    ];

    public function getExams(mixed $default = null,? array $vars = null): array{
        return parent::getExams(['right' => null, 'left' => null]);
    }
}
