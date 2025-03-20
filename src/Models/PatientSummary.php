<?php

namespace Hanafalah\ModuleExamination\Models;

use Hanafalah\ModuleSummary\Models\Summary\Summary;

class PatientSummary extends Summary
{
    protected $table = 'summaries';
    protected $list  = ['id', 'parent_id', 'patient_id', 'reference_type', 'reference_id', 'props'];

    public function patient()
    {
        return $this->belongsToModel('Patient');
    }
    public function assessment()
    {
        return $this->hasOneModel('Assessment');
    }
    public function assessments()
    {
        return $this->hasManyModel('Assessment');
    }
}
