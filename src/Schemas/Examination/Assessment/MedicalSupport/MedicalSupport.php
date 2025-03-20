<?php

namespace Gii\ModuleExamination\Schemas\Examination\Assessment\MedicalSupport;

use Gii\ModuleExamination\Contracts\Examination\Assessment\MedicalSupport\MedicalSupport as ContractsMedicalSupport;
use Gii\ModuleExamination\Schemas\Examination\Assessment\MedicalSupport\TrxMedicalSupport;

class MedicalSupport extends TrxMedicalSupport implements ContractsMedicalSupport{
    protected string $__entity   = 'MedicalSupport';
}
