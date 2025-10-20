<?php

namespace Hanafalah\ModuleExamination\Schemas\Examination\Assessment\Diagnose;

use Hanafalah\ModuleExamination\Contracts\Schemas\Examination\Assessment\Diagnose\PrimaryDiagnose as ContractsPrimaryDiagnose;
use Illuminate\Database\Eloquent\Builder;

class PrimaryDiagnose extends Diagnose implements ContractsPrimaryDiagnose
{
    protected string $__entity   = 'PrimaryDiagnose';
}
