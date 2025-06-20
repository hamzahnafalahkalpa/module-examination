<?php

namespace Hanafalah\ModuleExamination\Schemas\Examination\Assessment;

use Hanafalah\ModuleExamination\Contracts\Schemas\Examination\Assessment\Anthropometry as ContractsAnthropometry;
use Hanafalah\ModuleExamination\Schemas\Examination\Assessment\Assessment;

class Anthropometry extends Assessment implements ContractsAnthropometry
{
    protected string $__entity   = 'Anthropometry';
}
