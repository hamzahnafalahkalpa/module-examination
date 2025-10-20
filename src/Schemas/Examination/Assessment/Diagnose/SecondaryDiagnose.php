<?php

namespace Hanafalah\ModuleExamination\Schemas\Examination\Assessment\Diagnose;

use Hanafalah\ModuleExamination\Contracts\Schemas\Examination\Assessment\Diagnose\SecondaryDiagnose as ContractsSecondaryDiagnose;
use Illuminate\Database\Eloquent\Builder;

class SecondaryDiagnose extends Diagnose implements ContractsSecondaryDiagnose
{
    protected string $__entity   = 'SecondaryDiagnose';
}
