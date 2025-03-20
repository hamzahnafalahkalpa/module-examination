<?php

namespace Gii\ModuleExamination\Models\Examination\Assessment\Treatment;

class LabTreatment extends TrxTreatment {
    protected $table = 'assessments';

    public $specific = [
        'name', 'treatment_id', 'note', 'status', 'paths'
    ];
}