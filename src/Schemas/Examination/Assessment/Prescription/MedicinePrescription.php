<?php

namespace Hanafalah\ModuleExamination\Schemas\Examination\Assessment\Prescription;

use Hanafalah\ModuleExamination\Contracts\Schemas\Examination\Assessment\Prescription\MedicinePrescription as ContractsMedicinePrescription;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class MedicinePrescription extends TrxPrescription implements ContractsMedicinePrescription
{
    protected string $__entity   = 'MedicinePrescription';
    public function trxPrescription(): Builder
    {
        $this->booting();
        return $this->MedicinePrescriptionModel()->withParameters('or')->orderBy('props->name', 'asc');
    }

    public function prepareStore(mixed $attributes = null): Model
    {
        $attributes ??= request()->all();
        $attributes = $this->medicationSetup($attributes);
        $freq_unit = $this->ItemStuffModel()->find($attributes['frequency_unit_id']);
        if (!isset($freq_unit)) throw new \Exception('Frequency unit not found', 422);
        $attributes['frequency_unit_name'] = $freq_unit->name;
        $assessment = parent::prepareStore($attributes);
        $attributes['card_stocks'][] = $attributes['card_stock'];

        $this->addPrescription($attributes);
        return static::$assessment_model = $assessment;
    }
}
