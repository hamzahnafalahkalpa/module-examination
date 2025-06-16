<?php

namespace Gii\PuskesmasModuleExamination\Models\Examination\Assessment;

class VisualImpairmentTest extends Assessment{
    protected $table  = 'assessments';
    public $response_model = 'array';
    public $specific  = [
        'type'
    ];
}
