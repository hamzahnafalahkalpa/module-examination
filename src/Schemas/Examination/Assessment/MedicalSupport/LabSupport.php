<?php

namespace Hanafalah\ModuleExamination\Schemas\Examination\Assessment\MedicalSupport;

use Hanafalah\ModuleExamination\Contracts\Schemas\Examination\Assessment\MedicalSupport\LabSupport as ContractsLabSupport;
use Hanafalah\ModuleExamination\Schemas\Examination\Assessment\MedicalSupport\TrxMedicalSupport;

class LabSupport extends TrxMedicalSupport implements ContractsLabSupport
{
    protected string $__entity   = 'LabSupport';
}
