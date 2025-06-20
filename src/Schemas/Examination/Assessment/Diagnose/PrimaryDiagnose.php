<?php

namespace Hanafalah\ModuleExamination\Schemas\Examination\Assessment\Diagnose;

use Hanafalah\ModuleExamination\Contracts\Schemas\Examination\Assessment\Diagnose\PrimaryDiagnose as ContractsPrimaryDiagnose;
use Illuminate\Database\Eloquent\Builder;

class PrimaryDiagnose extends Diagnose implements ContractsPrimaryDiagnose
{
    protected string $__entity   = 'PrimaryDiagnose';
    public function diagnose(): Builder
    {
        $this->booting();
        return $this->PrimaryDiagnoseModel()->withParameters('or')->orderBy('props->name', 'asc');
    }
}
