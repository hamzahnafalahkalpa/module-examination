<?php

namespace Gii\PuskesmasModuleExamination\Models\Examination\Assessment;

use Gii\PuskesmasModuleExamination\Models\Examination\Assessment\Assessment;

class MCUPackageSummary extends Assessment {
    protected $table = 'assessments';
    
    public $specific = [
        'service_lists',
        'abnormalities','suggestions'
    ];


}
