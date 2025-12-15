<?php

namespace Hanafalah\ModuleExamination\Schemas\Examination\Assessment;

use Hanafalah\ModuleExamination\Contracts\Data\AssessmentData;
use Hanafalah\ModuleExamination\Contracts\Schemas\Examination\Assessment\Alloanamnese as ContractsAlloanamnese;
use Illuminate\Database\Eloquent\Model;

class Alloanamnese extends Assessment implements ContractsAlloanamnese
{
    protected string $__entity   = 'Alloanamnese';
    public $alloanamnese_model;

    public function prepareStore(AssessmentData &$assessment_dto): Model{
        $assessment_exam = &$assessment_dto->props['exam'];
        $assessment_exam['is_alloanamnese'] ??= false;

        $family_role = $this->FamilyRoleModel();
        if (isset($assessment_exam['family_role_id'])) {
            $family_role = $family_role->findOrFail($assessment_exam['family_role_id']);
        }
        $assessment_exam['family_role'] = $family_role->toViewApiOnlies('id','name','flag','label');
        return parent::prepareStore($assessment_dto);
    }
}
