<?php

use Hanafalah\ModuleExamination\Models\Form\Survey;

return [
    'label'  => 'ISKJ',
    'name'  => 'INSTRUMENT SKRINING KESEHATAN JIWA (ISKJ)',
    'dynamic_forms'  => [
        [
            'label'          => 'Apakah Anda mudah lelah?',
            'key'            => 'value',
            'type'           => Survey::TYPE_RADIO,
            'component_name' => null,
            'default_value'  => null,
            'attribute'      => null,
            'rule'           => null,
            'options'        => [
                [
                    'label' => 'Ya',
                    'value' => 1
                ],
                [
                    'label' => 'Tidak',
                    'value' => 0
                ]
            ]
        ],
        [
            'label'          => 'Apakah Anda mengalami kesulitan untuk mengambil keputusan?',
            'key'            => 'value',
            'type'           => Survey::TYPE_RADIO,
            'component_name' => null,
            'default_value'  => null,
            'attribute'      => null,
            'rule'           => null,
            'options'        => [
                [
                    'label' => 'Ya',
                    'value' => 1
                ],
                [
                    'label' => 'Tidak',
                    'value' => 0
                ]
            ]
        ],
        [
            'label'          => 'Apakah Anda merasa tidak enak di perut?',
            'key'            => 'value',
            'type'           => Survey::TYPE_RADIO,
            'component_name' => null,
            'default_value'  => null,
            'attribute'      => null,
            'rule'           => null,
            'options'        => [
                [
                    'label' => 'Ya',
                    'value' => 1
                ],
                [
                    'label' => 'Tidak',
                    'value' => 0
                ]
            ]
        ],
        [
            'label'          => 'Apakah Anda merasa tidak berharga?',
            'key'            => 'value',
            'type'           => Survey::TYPE_RADIO,
            'component_name' => null,
            'default_value'  => null,
            'attribute'      => null,
            'rule'           => null,
            'options'        => [
                [
                    'label' => 'Ya',
                    'value' => 1
                ],
                [
                    'label' => 'Tidak',
                    'value' => 0
                ]
            ]
        ],
        [
            'label'          => 'Apakah Anda merasa sulit untuk menikmati aktivitas sehari-hari?',
            'key'            => 'value',
            'type'           => Survey::TYPE_RADIO,
            'component_name' => null,
            'default_value'  => null,
            'attribute'      => null,
            'rule'           => null,
            'options'        => [
                [
                    'label' => 'Ya',
                    'value' => 1
                ],
                [
                    'label' => 'Tidak',
                    'value' => 0
                ]
            ]
        ],
    ]
];
