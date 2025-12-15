<?php

namespace Hanafalah\ModuleExamination\Schemas\Examination\Assessment\MedicalLegalDoc;
use Hanafalah\ModuleExamination\Contracts\Schemas\Examination\Assessment\MedicalLegalDoc\InformedConsent as ContractInformedConsent;

class InformedConsent extends TrxMedicalLegalDoc implements ContractInformedConsent
{
    protected string $__entity = 'InformedConsent';
}
