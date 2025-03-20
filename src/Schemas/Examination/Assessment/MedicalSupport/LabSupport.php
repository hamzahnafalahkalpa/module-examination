<?php

namespace Gii\ModuleExamination\Schemas\Examination\Assessment\MedicalSupport;

use Gii\ModuleExamination\Contracts\Examination\Assessment\MedicalSupport\LabSupport as ContractsLabSupport;
use Gii\ModuleExamination\Schemas\Examination\Assessment\MedicalSupport\TrxMedicalSupport;

class LabSupport extends TrxMedicalSupport implements ContractsLabSupport{
    protected string $__entity   = 'LabSupport';
}
