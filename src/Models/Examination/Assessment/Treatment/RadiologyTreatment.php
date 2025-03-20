<?php

namespace Hanafalah\ModuleExamination\Models\Examination\Assessment\Treatment;

class RadiologyTreatment extends TrxTreatment
{
    protected $table = 'assessments';

    public $specific = [
        'name',
        'treatment_id',
        'reference_id',
        'reference_type',
        'treatment_at',
        'note',
        'status',
        'paths',
        'interpretation',
        'result'
    ];
}
