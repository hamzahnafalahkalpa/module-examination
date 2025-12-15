<?php

namespace Hanafalah\ModuleExamination\Models\Examination\Assessment\MedicalLegalDocument;

use Hanafalah\ModuleExamination\Models\Examination\Assessment\Assessment;

use Hanafalah\ModuleExamination\Resources\Examination\TrxMedicalLegalDocument\{
    ViewTrxMedicalLegalDocument, ShowTrxMedicalLegalDocument
};

class TrxMedicalLegalDocument extends Assessment
{
    protected $table = 'assessments';

    public $response_model   = 'array';

    public function getViewResource(){
        return ViewTrxMedicalLegalDocument::class;
    }

    public function getShowResource(){
        return ShowTrxMedicalLegalDocument::class;
    }
}
