<?php

namespace Gii\ModuleExamination\Schemas\Examination\Assessment;

use Gii\ModuleExamination\Contracts\Examination\Assessment\Anthropometry as ContractsAnthropometry;
use Gii\ModuleExamination\Schemas\Examination\Assessment\Assessment;

class Anthropometry extends Assessment implements ContractsAnthropometry{
    protected string $__entity   = 'Anthropometry';
}