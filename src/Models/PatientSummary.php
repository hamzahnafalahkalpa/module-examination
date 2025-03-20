<?php

namespace Gii\ModuleExamination\Models;

use Zahzah\ModuleSummary\Models\Summary\Summary;

class PatientSummary extends Summary {
    protected $table = 'summaries';
    protected $list  = ['id', 'parent_id', 'patient_id','reference_type','reference_id','props'];

    public function patient(){return $this->belongsToModel('Patient');}
    public function assessment(){return $this->hasOneModel('Assessment');}
    public function assessments(){return $this->hasManyModel('Assessment');}
}
