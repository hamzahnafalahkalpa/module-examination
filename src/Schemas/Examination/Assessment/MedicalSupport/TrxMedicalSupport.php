<?php

namespace Hanafalah\ModuleExamination\Schemas\Examination\Assessment\MedicalSupport;

use Hanafalah\ModuleExamination\Contracts\Data\AssessmentData;
use Hanafalah\ModuleExamination\Contracts\Schemas\Examination\Assessment\MedicalSupport\TrxMedicalSupport as ContractsTrxMedicalSupport;
use Hanafalah\ModuleExamination\Schemas\Examination\Assessment\Assessment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class TrxMedicalSupport extends Assessment implements ContractsTrxMedicalSupport
{
    public $trx_medical_support;

    public function prepareStore(AssessmentData $assessment_dto): Model{
        $this->prepareStoreAssessment($assessment_dto);
        $assessment_exam = &$assessment_dto->props['exam'];
        
        if (isset($assessment_exam['files']) && count($assessment_exam['files']) > 0) {
            $assessment_exam = $this->storePdf($assessment_exam, Str::snake(class_basename($this)));
        }
        $this->trx_medical_support = $support = $this->prepareStoreAssessment($assessment_dto);
        return $this->assessment_model = $support;
    }
}
