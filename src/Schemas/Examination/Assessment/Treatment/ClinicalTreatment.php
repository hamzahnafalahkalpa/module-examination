<?php

namespace Hanafalah\ModuleExamination\Schemas\Examination\Assessment\Treatment;

use Hanafalah\ModuleExamination\Contracts\Schemas\Examination\Assessment\Treatment\ClinicalTreatment as ContractsClinicalTreatment;

class ClinicalTreatment extends TrxTreatment implements ContractsClinicalTreatment
{
    protected string $__entity   = 'ClinicalTreatment';
}
