<?php

namespace Gii\ModuleExamination\Schemas\Examination\Assessment\Treatment;

use Gii\ModuleExamination\Contracts\Examination\Assessment\Treatment\LabTreatment as ContractsLabTreatment;
use Illuminate\Database\Eloquent\Builder;

class LabTreatment extends TrxTreatment implements ContractsLabTreatment{
    protected string $__entity   = 'LabTreatment';
    public function trxTreatment(): Builder{
        $this->booting();
        return $this->LabTreatmentModel()->withParameters('or');
    }
}
