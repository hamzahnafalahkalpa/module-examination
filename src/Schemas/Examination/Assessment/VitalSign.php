<?php

namespace Hanafalah\ModuleExamination\Schemas\Examination\Assessment;

use Hanafalah\ModuleExamination\Contracts\Data\AssessmentData;
use Hanafalah\ModuleExamination\Contracts\Schemas\Examination\Assessment\VitalSign as AssessmentVitalSign;
use Hanafalah\ModuleExamination\Schemas\Examination\Assessment\Assessment;
use Illuminate\Database\Eloquent\Model;

class VitalSign extends Assessment implements AssessmentVitalSign
{
    protected string $__entity   = 'VitalSign';

    public function prepareStore(AssessmentData $assessment_dto): Model{
        $assessment_exam = &$assessment_dto->props['exam'];
        $loc = $this->VitalSignStuffModel();
        if (isset($assessment_exam['loc_id'])){
            $loc = $loc->findOrFail($assessment_exam['loc_id']);
        }
        $assessment_exam['loc'] = $loc->toViewApiOnlies('id','name','flag','label');
        return parent::prepareStore($assessment_dto);
    }
}
