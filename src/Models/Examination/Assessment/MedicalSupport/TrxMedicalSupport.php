<?php

namespace Hanafalah\ModuleExamination\Models\Examination\Assessment\MedicalSupport;

use Hanafalah\ModuleExamination\Models\Examination\Assessment\Assessment;

class TrxMedicalSupport extends Assessment
{
    protected $table = 'assessments';

    public $response_model   = 'array';
}
