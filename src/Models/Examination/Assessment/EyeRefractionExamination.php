<?php

namespace Gii\ModuleExamination\Models\Examination\Assessment;

use Gii\ModuleExamination\Models\Examination\Assessment\Assessment;

class EyeRefractionExamination extends EyeExamination {
    protected $table = 'assessments';

    public $specific = [
        'Autoref', 'Refraksi Subjektif'
    ];
}
