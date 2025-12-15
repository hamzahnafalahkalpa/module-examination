<?php

namespace Hanafalah\ModuleExamination\Schemas\Examination\Assessment;

use Hanafalah\ModuleExamination\Contracts\Data\AssessmentData;
use Hanafalah\ModuleExamination\Contracts\Schemas\Examination\Assessment\ChildAndPregnancyHistory as AssessmentChildAndPregnancyHistory;
use Illuminate\Database\Eloquent\Model;

class ChildAndPregnancyHistory extends Assessment implements AssessmentChildAndPregnancyHistory
{
    protected string $__entity   = 'ChildAndPregnancyHistory';

    public function prepareStore(AssessmentData &$assessment_dto): Model{
        $assessment_exam = &$assessment_dto->props['exam'];
        $labor_type = $this->LaborTypeStuffModel();
        if (isset($assessment_exam['labor_type_id'])){
            $labor_type = $labor_type->findOrFail($assessment_exam['labor_type_id']);
        }
        $assessment_exam['labor_type'] = $labor_type->toViewApiOnlies('id','name','flag','label');

        $birth_helper = $this->BirthHelperStuffModel();
        if (isset($assessment_exam['birth_helper_id'])){
            $birth_helper = $birth_helper->findOrFail($assessment_exam['birth_helper_id']);
        }
        $assessment_exam['birth_helper'] = $birth_helper->toViewApiOnlies('id','name','flag','label');
        return parent::prepareStore($assessment_dto);
    }
}
