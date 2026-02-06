<?php

namespace Hanafalah\ModuleExamination\Schemas\Examination\Assessment\Diagnose;

use Hanafalah\ModuleExamination\Contracts\Schemas\Examination\Assessment\Diagnose\FamilyIllness as ContractsFamilyIllness;
use Illuminate\Database\Eloquent\{
    Model
};

class FamilyIllness extends Diagnose implements ContractsFamilyIllness
{
    protected string $__entity   = 'FamilyIllness';

    public function prepareStore(mixed &$assessment_dto): Model{
        $family_illness = parent::prepareStore($assessment_dto);
        return $family_illness;
    }
}
