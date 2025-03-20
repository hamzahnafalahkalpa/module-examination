<?php

namespace Hanafalah\ModuleExamination\Schemas\Examination\Assessment\MedicalSupport;

use Hanafalah\ModuleExamination\Contracts\Examination\Assessment\MedicalSupport\MedicalSupport as ContractsMedicalSupport;
use Hanafalah\ModuleExamination\Schemas\Examination\Assessment\MedicalSupport\TrxMedicalSupport;

class MedicalSupport extends TrxMedicalSupport implements ContractsMedicalSupport
{
    protected string $__entity   = 'MedicalSupport';
}
