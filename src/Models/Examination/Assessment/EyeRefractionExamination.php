<?php

namespace Hanafalah\ModuleExamination\Models\Examination\Assessment;

class EyeRefractionExamination extends EyeExamination {
    protected $table = 'assessments';

    public $specific = [
        'autoref', 'refraksi_subjektif'
    ];

    public function getExams(mixed $default = null,? array $vars = null): array{
        return parent::getExams(['kanan' => null, 'kiri' => null]);
    }
}
