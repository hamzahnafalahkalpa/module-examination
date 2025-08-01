<?php

use Hanafalah\ModuleExamination\Models\Form\MasterSurvey;

return [
    'label'  => 'GDS4',
    'name'  => 'ABBREVIATED MENTAL TEST (GDS4)',
    'dynamic_forms'  => [
        [
            'label'          => 'Apakah Anda sebenarnya cukup puas dengan hidup Anda?',
            'key'            => 'value',
            'type'           => MasterSurvey::TYPE_RADIO,
            'component_name' => null,
            'default_value'  => null,
            'attribute'      => null,
            'rule'           => null,
            'options'        => [
                [
                    'label' => 'Ya',
                    'value' => 'ya'
                ],
                [
                    'label' => 'Tidak',
                    'value' => 'tidak'
                ]
            ]
        ],
        [
            'label'          => 'Apakah Anda merasa tidak berharga seperti perasaan anda saat ini?',
            'key'            => 'value',
            'type'           => MasterSurvey::TYPE_RADIO,
            'component_name' => null,
            'default_value'  => null,
            'attribute'      => null,
            'rule'           => null,
            'options'        => [
                [
                    'label' => 'Ya',
                    'value' => 'ya'
                ],
                [
                    'label' => 'Tidak',
                    'value' => 'tidak'
                ]
            ]
        ],
        [
            'label'          => 'Apakah Anda sering merasa tidak berdaya?',
            'key'            => 'value',
            'type'           => MasterSurvey::TYPE_RADIO,
            'component_name' => null,
            'default_value'  => null,
            'attribute'      => null,
            'rule'           => null,
            'options'        => [
                [
                    'label' => 'Ya',
                    'value' => 'ya'
                ],
                [
                    'label' => 'Tidak',
                    'value' => 'tidak'
                ]
            ]
        ],
        [
            'label'          => 'Apakah Anda sering merasa bosan?',
            'key'            => 'value',
            'type'           => MasterSurvey::TYPE_RADIO,
            'component_name' => null,
            'default_value'  => null,
            'attribute'      => null,
            'rule'           => null,
            'options'        => [
                [
                    'label' => 'Ya',
                    'value' => 'ya'
                ],
                [
                    'label' => 'Tidak',
                    'value' => 'tidak'
                ]
            ]
        ]
    ]
];