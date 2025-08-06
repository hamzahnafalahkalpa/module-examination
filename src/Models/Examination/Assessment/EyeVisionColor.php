<?php

namespace Hanafalah\ModuleExamination\Models\Examination\Assessment;

use Hanafalah\ModuleExamination\Models\Examination\Assessment\Assessment;

class EyeVisionColor extends Assessment {
    protected $table = 'assessments';

    public $specific = [
        'distance_vision', 'near_vision','right','left','conclusion','suggestion','color_vision'
    ];

    public function getExams(mixed $default = null,? array $vars = null): array{
        $exams = parent::getExams();
        $exams['exam'] = [
            'distance_vision' => [
                'unaided' => [
                    "right" => null,
                    "left" => null,
                    "binocular" => null
                ],
                'aided' => [
                    "right" => null,
                    "left" => null,
                    "binocular" => null
                ]
            ],
            'near_vision' => [
                'unaided' => [
                    "right" => null,
                    "left" => null,
                    "binocular" => null
                ],
                'aided' => [
                    "right" => null,
                    "left" => null,
                    "binocular" => null
                ]
            ],
            'field_vision' => [
                'left' => [
                    "normal" => true,
                    "note" => null
                ],
                'right' => [
                    "normal" => true,
                    "note" => null
                ]
            ],
            'color_vision' => null,
            'conclusion' => null,
            'suggestion' => null
        ];
        return $exams;
    }
}
