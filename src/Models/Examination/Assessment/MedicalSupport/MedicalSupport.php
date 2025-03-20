<?php

namespace Hanafalah\ModuleExamination\Models\Examination\Assessment\MedicalSupport;

class MedicalSupport extends TrxMedicalSupport
{
    protected $table = 'assessments';

    public $specific = [
        'name',
        'paths'
    ];
}
