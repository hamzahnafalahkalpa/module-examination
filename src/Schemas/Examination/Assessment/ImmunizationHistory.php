<?php

namespace Hanafalah\ModuleExamination\Schemas\Examination\Assessment;

use Hanafalah\ModuleExamination\Contracts\Data\AssessmentData;
use Hanafalah\ModuleExamination\Contracts\Schemas\Examination\Assessment\ImmunizationHistory as AssessmentImmunizationHistory;
use Illuminate\Database\Eloquent\Model;

class ImmunizationHistory extends Assessment implements AssessmentImmunizationHistory
{
    protected string $__entity   = 'ImmunizationHistory';

    public function prepareStore(AssessmentData &$assessment_dto): Model{
        $assessment_exam = &$assessment_dto->props['exam'];
        $immunization = $this->ImmunizationStuffModel();
        if (isset($assessment_exam['immunization_id'])){
            $immunization = $immunization->findOrFail($assessment_exam['immunization_id']);
        }
        $assessment_exam['immunization'] = $immunization->toViewApiOnlies('id','name','flag','label');
        return parent::prepareStore($assessment_dto);
    }
    
}
