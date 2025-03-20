<?php

namespace Gii\ModuleExamination\Models\Examination\Assessment;

use Gii\ModuleExamination\Models\Examination\Assessment\Assessment;

class EyeVisionColor extends Assessment {
    protected $table = 'assessments';

    public $specific = [
        'distance_vision', 'near_vision','right','left','conclusion','suggestion','color_vision'
    ];
}
