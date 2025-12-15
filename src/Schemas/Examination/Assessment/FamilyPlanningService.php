<?php

namespace Hanafalah\ModuleExamination\Schemas\Examination\Assessment;

use Hanafalah\ModuleExamination\Contracts\Data\AssessmentData;
use Hanafalah\ModuleExamination\Contracts\Schemas\Examination\Assessment\FamilyPlanningService as AssessmentFamilyPlanningService;
use Illuminate\Database\Eloquent\Model;

class FamilyPlanningService extends Assessment implements AssessmentFamilyPlanningService
{
    protected string $__entity   = 'FamilyPlanningService';

    public function prepareStore(AssessmentData &$assessment_dto): Model{
        $assessment_exam = &$assessment_dto->props['exam'];
        $contraception_type = $this->ContraceptionStuffModel();
        if (isset($assessment_exam['contraception_type_id'])){
            $contraception_type = $contraception_type->findOrFail($assessment_exam['contraception_type_id']);
        }
        $assessment_exam['contraception_type'] = $contraception_type->toViewApiOnlies('id','name','flag','label');
        return parent::prepareStore($assessment_dto);
    }
    
}
