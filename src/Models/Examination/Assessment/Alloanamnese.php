<?php

namespace Gii\PuskesmasModuleExamination\Models\Examination\Assessment;

class Alloanamnese extends Assessment {
    protected $table = 'assessments';
    public $specific = [
        'is_alloanamnese', 'source_name', 'relationship_as'
    ];
}