<?php

namespace Hanafalah\ModuleExamination\Models\Examination\Assessment;

class Alloanamnese extends Assessment {
    protected $table = 'assessments';
    public $specific = [
        'is_alloanamnese', 'source_name', 'family_role_id'
    ];
}