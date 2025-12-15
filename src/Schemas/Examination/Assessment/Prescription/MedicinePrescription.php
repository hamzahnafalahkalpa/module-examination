<?php

namespace Hanafalah\ModuleExamination\Schemas\Examination\Assessment\Prescription;

use Hanafalah\ModuleExamination\Contracts\Schemas\Examination\Assessment\Prescription\MedicinePrescription as ContractsMedicinePrescription;
use Illuminate\Database\Eloquent\Model;

class MedicinePrescription extends TrxPrescription implements ContractsMedicinePrescription
{
    protected string $__entity   = 'MedicinePrescription';
}
