<?php

namespace Hanafalah\ModuleExamination\Schemas\Examination\Assessment\Diagnose;

use Hanafalah\ModuleExamination\Contracts\Schemas\Examination\Assessment\Diagnose\InitialDiagnose as ContractsInitialDiagnose;
use Illuminate\Database\Eloquent\Builder;

class InitialDiagnose extends Diagnose implements ContractsInitialDiagnose
{
    protected string $__entity   = 'InitialDiagnose';
}
