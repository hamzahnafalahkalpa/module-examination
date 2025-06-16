<?php

namespace Gii\PuskesmasModuleExamination\Models\Examination\Assessment;

class AdministrationVitaminA extends Assessment{
    protected $table  = 'assessments';
    public $response_model = 'array';
    public $specific  = [
        'vitamin_type','date'
    ];
}
