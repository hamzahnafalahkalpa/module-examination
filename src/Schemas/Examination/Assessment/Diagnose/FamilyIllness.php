<?php

namespace Hanafalah\ModuleExamination\Schemas\Examination\Assessment\Diagnose;

use Hanafalah\ModuleExamination\Contracts\Schemas\Examination\Assessment\Diagnose\FamilyIllness as ContractsFamilyIllness;
use Illuminate\Database\Eloquent\Builder;

class FamilyIllness extends Diagnose implements ContractsFamilyIllness
{
    protected string $__entity   = 'FamilyIllness';
    public function diagnose(): Builder
    {
        $this->booting();
        return $this->FamilyIllnessModel()->withParameters('or')->orderBy('props->name', 'asc');
    }
}
