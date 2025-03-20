<?php

namespace Gii\ModuleExamination\Schemas\Examination\Assessment\MedicalSupport;

use Gii\ModuleExamination\Contracts\Examination\Assessment\MedicalSupport\RadiologySupport as ContractsRadiologySupport;
use Gii\ModuleExamination\Schemas\Examination\Assessment\MedicalSupport\TrxMedicalSupport;

class RadiologySupport extends TrxMedicalSupport implements ContractsRadiologySupport{
    protected string $__entity   = 'RadiologySupport';
}
