<?php

namespace Hanafalah\ModuleExamination\Models\Examination\Assessment\Diagnose;

use Hanafalah\ModuleExamination\Resources\Examination\Assessment\Diagnose\PatientFamilyIllness\{
    ShowPatientFamilyIllness,
    ViewPatientFamilyIllness
};

class PatientFamilyIllness extends Diagnose
{
    protected $table = 'assessments';
    public $response_model = 'array';
    public $specific = [
        'family_illness', 'history_illness'
    ];

    public function getViewResource(){
        return ViewPatientFamilyIllness::class;
    }

    public function getShowResource(){
        return ShowPatientFamilyIllness::class;
    }
}
