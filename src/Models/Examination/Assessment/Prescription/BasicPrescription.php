<?php

namespace Hanafalah\ModuleExamination\Models\Examination\Assessment\Prescription;

use Hanafalah\ModuleExamination\Resources\Examination\Assessment\Prescription\BasicPrescription\{
    ViewBasicPrescription, ShowBasicPrescription
};

class BasicPrescription extends TrxPrescription
{
    protected $table = 'assessments';
    public $specific = [
        'medicine_prescription', 'medic_tool_prescription', 'mix_prescription'
    ];

    public function getViewResource(){
        return ViewBasicPrescription::class;
    }

    public function getShowResource(){
        return ShowBasicPrescription::class;
    }
}
