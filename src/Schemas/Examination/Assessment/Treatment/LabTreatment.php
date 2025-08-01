<?php

namespace Hanafalah\ModuleExamination\Schemas\Examination\Assessment\Treatment;

use Hanafalah\ModuleExamination\Contracts\Schemas\Examination\Assessment\Treatment\LabTreatment as ContractsLabTreatment;

class LabTreatment extends TrxTreatment implements ContractsLabTreatment
{
    protected string $__entity   = 'LabTreatment';
}
