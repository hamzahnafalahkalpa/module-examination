<?php

namespace Hanafalah\ModuleExamination\Schemas\Examination\Assessment\MedicalSupport;

use Hanafalah\ModuleExamination\Contracts\Schemas\Examination\Assessment\MedicalSupport\RadiologySupport as ContractsRadiologySupport;
use Hanafalah\ModuleExamination\Schemas\Examination\Assessment\MedicalSupport\TrxMedicalSupport;

class RadiologySupport extends TrxMedicalSupport implements ContractsRadiologySupport
{
    protected string $__entity   = 'RadiologySupport';
}
