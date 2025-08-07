<?php

namespace Hanafalah\ModuleExamination\Schemas\Examination\Assessment;

use Hanafalah\ModuleExamination\Contracts\Data\AssessmentData;
use Hanafalah\ModuleExamination\Contracts\Schemas\Examination\Assessment\SingleTest as ContractsSingleTest;
use Hanafalah\ModuleExamination\Schemas\Examination\Assessment\Assessment;
use Illuminate\Database\Eloquent\Model;

class SingleTest extends Assessment implements ContractsSingleTest
{
    protected string $__entity   = 'SingleTest';

    public function prepareStore(AssessmentData $assessment_dto): Model{
        $assessment_exam = &$assessment_dto->props['exam'];
        $category = $this->SingleTestStuffModel();
        if (isset($assessment_exam['category_id'])){
            $category = $category->findOrFail($assessment_exam['category_id']);
        }
        $assessment_exam['category'] = $category->toViewApiOnlies('id','name','flag','label');
        return parent::prepareStore($assessment_dto);
    }
}
