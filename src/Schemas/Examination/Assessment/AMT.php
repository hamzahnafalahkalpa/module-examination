<?php

namespace Hanafalah\ModuleExamination\Schemas\Examination\Assessment;

use Hanafalah\ModuleExamination\Contracts\Schemas\Examination\Assessment\AMT as ContractsAMT;
use Hanafalah\ModuleExamination\Schemas\Examination\Assessment\Assessment;

class AMT extends Assessment implements ContractsAMT
{
    protected string $__entity   = 'AMT';
}
