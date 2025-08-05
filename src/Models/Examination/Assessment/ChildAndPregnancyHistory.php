<?php

namespace Hanafalah\ModuleExamination\Models\Examination\Assessment;

class ChildAndPregnancyHistory extends Assessment{

    protected $table  = 'assessments';
    public $response_model = 'array';
    public $specific  = [
        'child_order',
        'name',
        'dob',
        'gestational_age',
        'is_asi_exclusive',
        'labor_type',
        'weight',
        'sex',
        'helper',
        'maternity_ward',
        'child_complication',
        'mother_complication',
        'postpartum_complication'
    ];
}
