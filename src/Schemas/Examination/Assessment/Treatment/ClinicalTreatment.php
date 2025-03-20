<?php

namespace Gii\ModuleExamination\Schemas\Examination\Assessment\Treatment;

use Gii\ModuleExamination\Contracts\Examination\Assessment\Treatment\ClinicalTreatment as ContractsClinicalTreatment;
use Illuminate\Database\Eloquent\Builder;

class ClinicalTreatment extends TrxTreatment implements ContractsClinicalTreatment{
    protected string $__entity   = 'ClinicalTreatment';
    public function trxTreatment(): Builder{
        $this->booting();
        return $this->ClinicalTreatmentModel()->withParameters('or');
    }
}
