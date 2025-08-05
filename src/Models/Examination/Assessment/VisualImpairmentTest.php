<?php

namespace Hanafalah\ModuleExamination\Models\Examination\Assessment;

//Formulir Gangguan Pengelihatan 
class VisualImpairmentTest extends Assessment{
    protected $table  = 'assessments';
    public $response_model = 'array';
    public $specific  = [
        'type'
    ];
}
