<?php

namespace Gii\ModuleExamination\Models\Examination\Assessment\MedicalSupport;

use Gii\ModuleExamination\Models\Examination\Assessment\Assessment;

class TrxMedicalSupport extends Assessment {
    protected $table = 'assessments';

    public $response_model   = 'array';
}