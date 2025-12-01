<?php

namespace Hanafalah\ModuleExamination\Models\Examination\Assessment\MedicalSupport;

use Hanafalah\ModuleExamination\Models\Examination\Assessment\Assessment;

use Hanafalah\ModuleExamination\Resources\Examination\TrxMedicalSupport\{
    ViewTrxMedicalSupport, ShowTrxMedicalSupport
};

class TrxMedicalSupport extends Assessment
{
    protected $table = 'assessments';

    public $response_model   = 'array';

    public function getViewResource(){
        return ViewTrxMedicalSupport::class;
    }

    public function getShowResource(){
        return ShowTrxMedicalSupport::class;
    }
}
