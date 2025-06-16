<?php

namespace Gii\PuskesmasModuleExamination\Models\Examination\Assessment;

class Odontogram extends Assessment {
    protected $table = 'assessments';
    public $specific = [
        'anatomies'
    ];
}