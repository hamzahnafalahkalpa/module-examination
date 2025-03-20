<?php

namespace Gii\ModuleExamination\Models\Examination\Assessment;

use Gii\ModuleExamination\Models\Examination\Assessment\Assessment;

class MCUPackageSummary extends Assessment {
    protected $table = 'assessments';
    
    public $specific = [
        'service_lists',
        'abnormalities','suggestions'
    ];


}
