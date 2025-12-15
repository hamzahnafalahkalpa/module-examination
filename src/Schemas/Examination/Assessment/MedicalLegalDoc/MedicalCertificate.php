<?php

namespace Hanafalah\ModuleExamination\Schemas\Examination\Assessment\MedicalLegalDoc;

use Hanafalah\ModuleExamination\Contracts\Schemas\Examination\Assessment\MedicalLegalDoc\MedicalCertificate as MedicalLegalDocMedicalCertificate;

class MedicalCertificate extends TrxMedicalLegalDoc implements MedicalLegalDocMedicalCertificate
{
    protected string $__entity   = 'MedicalCertificate';
}
