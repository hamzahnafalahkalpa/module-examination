<?php

namespace Gii\ModuleExamination\Models\Examination\Assessment\Treatment;

class ClinicalTreatment extends TrxTreatment {
    protected $table = 'assessments';
    public $specific = [
        'name', 'treatment_id', 'treatment_at', 'note', 'status', 'medications',
        'form','paths'
    ];
}
