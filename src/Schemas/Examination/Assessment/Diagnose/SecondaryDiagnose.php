<?php

namespace Gii\ModuleExamination\Schemas\Examination\Assessment\Diagnose;

use Gii\ModuleExamination\Contracts\Examination\Assessment\Diagnose\SecondaryDiagnose as ContractsSecondaryDiagnose;
use Illuminate\Database\Eloquent\Builder;

class SecondaryDiagnose extends Diagnose implements ContractsSecondaryDiagnose{
    protected string $__entity   = 'SecondaryDiagnose';
    public function diagnose(): Builder{
        $this->booting();
        return $this->SecondaryDiagnoseModel()->withParameters('or')->orderBy('props->name','asc');
    }
}