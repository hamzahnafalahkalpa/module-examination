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
        $assessment_exam = &$assessment_dto->props['exam'];
        
        if (isset($assessment_exam['files']) && count($assessment_exam['files']) > 0) {
            $assessment_exam = $this->storePdf($assessment_exam, Str::snake(class_basename($this)));
        }
        $support = $this->prepareStoreAssessment($assessment_dto);
        // $this->fillingProps($support, $assessment_dto->props);
        // $support->save();
        return $this->assessment_model = $this->trx_medical_support = $support;
    }
}
