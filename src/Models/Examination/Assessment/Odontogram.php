<?php

namespace Gii\ModuleExamination\Models\Examination\Assessment;

class Odontogram extends Assessment {
    protected $table = 'assessments';
    public $specific = [
        'anatomies'
    ];
}