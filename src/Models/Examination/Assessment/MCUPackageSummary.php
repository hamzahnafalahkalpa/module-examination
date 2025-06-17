<?php

namespace Hanafalah\ModuleExamination\Models\Examination\Assessment;

use Hanafalah\ModuleExamination\Models\Examination\Assessment\Assessment;

class MCUPackageSummary extends Assessment {
    protected $table = 'assessments';
    
    public $specific = [
        'service_lists',
        'abnormalities','suggestions'
    ];
}