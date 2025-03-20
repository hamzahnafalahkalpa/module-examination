<?php

namespace Hanafalah\ModuleExamination\Models\Examination\Assessment\Treatment;

use Hanafalah\ModuleExamination\Models\Examination\Assessment\Assessment;

class TrxTreatment extends Assessment
{
    protected $table       = 'assessments';
    public $response_model = 'array';

    protected static function booted(): void
    {
        parent::booted();
        static::deleted(function ($query) {
            $query->examinationTreatment()->delete();
        });
    }

    public function examinationTreatment()
    {
        return $this->morphOneModel('ExaminationTreatment', 'reference');
    }
}
