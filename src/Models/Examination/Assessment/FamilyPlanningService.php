<?php

namespace Hanafalah\ModuleExamination\Models\Examination\Assessment;

class FamilyPlanningService extends Assessment{

    protected $table  = 'assessments';
    public $specific  = [
        'is_inflamation','note_inflamation',
        'is_gynecological_tumor','note_gynecological_tumor',
        'is_diabetic_sign','is_coagulation_disorder',
        'uterus_position','contraception_type_id'
    ];
}