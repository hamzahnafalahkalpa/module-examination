<?php

namespace Hanafalah\ModuleExamination\Models\Examination\Assessment\MedicalLegalDocument;

class InformedConsent extends TrxMedicalLegalDocument
{
    protected $table = 'assessments';

    public $specific = [
        'name',
        'document_type_id',
        'dynamic_forms',
        'paths'
    ];
}
