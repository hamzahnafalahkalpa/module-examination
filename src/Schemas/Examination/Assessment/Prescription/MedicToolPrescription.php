<?php

namespace Hanafalah\ModuleExamination\Schemas\Examination\Assessment\Prescription;

use Hanafalah\ModuleExamination\Contracts\Examination\Assessment\Prescription\MedicToolPrescription as ContractsMedicToolPrescription;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class MedicToolPrescription extends TrxPrescription implements ContractsMedicToolPrescription
{
    protected string $__entity   = 'MedicToolPrescription';
    public function trxPrescription(): Builder
    {
        $this->booting();
        return $this->MedicToolPrescriptionModel()->withParameters('or')->orderBy('props->name', 'asc');
    }

    public function prepareStore(?array $attributes = null): Model
    {
        $attributes ??= request()->all();

        $attributes = $this->medicationSetup($attributes);

        $assessment = parent::prepareStore($attributes);
        $attributes['card_stocks'][] = $attributes['card_stock'];
        $this->addPrescription($attributes);
        return static::$assessment_model = $assessment;
    }
}
