<?php

namespace Hanafalah\ModuleExamination\Schemas\Examination\Assessment\Prescription;

use Hanafalah\ModuleExamination\Contracts\Schemas\Examination\Assessment\Prescription\MedicToolPrescription as ContractsMedicToolPrescription;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class MedicToolPrescription extends TrxPrescription implements ContractsMedicToolPrescription
{
    protected string $__entity   = 'MedicToolPrescription';

    public function prepareStore(mixed $medicine_prescription_dto): Model{
        return parent::prepareStore($medicine_prescription_dto);
    }
}
