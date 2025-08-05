<?php

namespace Hanafalah\ModuleExamination\Models\Examination\Assessment;

use Hanafalah\ModuleExamination\Models\Examination\Assessment\Assessment;

class AudiometriTest extends Assessment {
    protected $table        = 'assessments';
    public $specific        = [
        "left_ear", "right_ear"
    ];

    public function getExams(mixed $default = null,? array $vars = null): array{
        return parent::getExams([
            'ac_values' => [
                ['label' => '250.00','value' => null],
                ['label' => '500.00','value' => null],
                ['label' => '1000.00','value' => null],
                ['label' => '2000.00','value' => null],
                ['label' => '3000.00','value' => null],
                ['label' => '4000.00','value' => null],
                ['label' => '6000.00','value' => null],
                ['label' => '8000.00','value' => null]
            ], 
            'bc_values' => [
                ['label' => '250.00','value' => null],
                ['label' => '500.00','value' => null],
                ['label' => '1000.00','value' => null],
                ['label' => '2000.00','value' => null],
                ['label' => '3000.00','value' => null],
                ['label' => '4000.00','value' => null],
                ['label' => '6000.00','value' => null],
                ['label' => '8000.00','value' => null]
            ]
        ]);
    }
}
