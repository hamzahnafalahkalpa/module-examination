<?php

namespace Gii\PuskesmasModuleExamination\Models\Examination\Assessment;

use Gii\PuskesmasModuleExamination\Models\Examination\Assessment\Assessment;

class EarExamination extends Assessment {
    protected $table = 'assessments';
    public $specific = [
        "daun_telinga", "liang_telinga", "membrane_timpani",
        "tumor", "mastoid","discharge"
    ];

    public function getExams(mixed $default = null,? array $vars = null): array{
        return parent::getExams(['right' => null, 'left' => null]);
    }
}