<?php

namespace Hanafalah\ModuleExamination\Models\Examination\Assessment\Diagnose;

use Hanafalah\ModuleExamination\Resources\Examination\Assessment\Diagnose\BasicDiagnose\{
    ViewBasicDiagnose,ShowBasicDiagnose
};

class BasicDiagnose extends Diagnose
{
    protected $table = 'assessments';
    public $response_model  = 'array';
    public $specific = [
        'initial_diagnose','primary_diagnose','secondary_diagnose'
    ];

    public function getViewResource(){
        return ViewBasicDiagnose::class;
    }

    public function getShowResource(){
        return ShowBasicDiagnose::class;
    }
}
