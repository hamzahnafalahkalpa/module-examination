<?php

namespace Gii\PuskesmasModuleExamination\Models\Examination\Assessment;

use Gii\PuskesmasModuleExamination\Models\Examination\Assessment\Assessment;

class EyeVisionColor extends Assessment {
    protected $table = 'assessments';

    public $specific = [
        'distance_vision', 'near_vision','right','left','conclusion','suggestion','color_vision'
    ];
}
