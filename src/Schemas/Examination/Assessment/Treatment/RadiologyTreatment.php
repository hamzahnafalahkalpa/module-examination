<?php

namespace Gii\ModuleExamination\Schemas\Examination\Assessment\Treatment;

use Gii\ModuleExamination\Contracts\Examination\Assessment\Treatment\RadiologyTreatment as ContractsRadiologyTreatment;
use Illuminate\Database\Eloquent\Builder;

class RadiologyTreatment extends TrxTreatment implements ContractsRadiologyTreatment{
    protected string $__entity   = 'RadiologyTreatment';
    public function trxTreatment(): Builder{
        $this->booting();
        return $this->RadiologyTreatmentModel()->withParameters('or');
    }
}
