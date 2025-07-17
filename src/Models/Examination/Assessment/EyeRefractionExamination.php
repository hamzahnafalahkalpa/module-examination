<?php

namespace Hanafalah\ModuleExamination\Models\Examination\Assessment;

use Hanafalah\ModuleExamination\Models\Examination\Assessment\Assessment;

class EyeRefractionExamination extends EyeExamination {
    protected $table = 'assessments';

    public $specific = [
        'Autoref', 'Refraksi Subjektif'
    ];
}
