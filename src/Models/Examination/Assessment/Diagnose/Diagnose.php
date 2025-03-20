<?php

namespace Hanafalah\ModuleExamination\Models\Examination\Assessment\Diagnose;

use Hanafalah\ModuleExamination\Models\Examination\Assessment\Assessment;

class Diagnose extends Assessment
{
    protected $table = 'assessments';
    public $specific = [
        'name',
        'disease_code',
        'disease_type',
        'disease_id',
        'classification_disease_id'
    ];

    protected static function booted(): void
    {
        parent::booted();
        static::deleted(function ($query) {
            $query->patientIllness()->delete();
        });
    }

    public function patientIllness()
    {
        return $this->morphOneModel('PatientIllness', 'reference');
    }
}
