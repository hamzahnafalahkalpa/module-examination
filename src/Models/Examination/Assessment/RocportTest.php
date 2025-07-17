<?php

namespace Hanafalah\ModuleExamination\Models\Examination\Assessment;
class RocportTest extends Assessment{
    protected $table  = 'assessments';
    public $specific  = [
        'score','result'
    ];
}
