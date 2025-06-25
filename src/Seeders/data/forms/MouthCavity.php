<?php

use Gii\PuskesmasModuleExamination\Models\Form\MasterSurvey;

return [
    'flag'  => 'MOUTH',
    'name'  => 'Keadaan Ronggal Mulut',
    'props' => [
        'dynamic_forms'  => [
            [
                'label'          => 'Stomatitis Aphtosa',
                'key'            => 'value',
                'type'           => MasterSurvey::TYPE_RADIO,
                'component_name' => null,
                'default_value'  => null,
                'attribute'      => null,
                'rule'           => null,
                'options'        => [
                    [
                        'label' => 'Ya',
                        'value' => 'Ya'
                    ],
                    [
                        'label' => 'Tidak',
                        'value' => 'Tidak'
                    ]
                ]
            ],
            [
                'label'          => 'Celah bibir/langit-langit',
                'key'            => 'value',
                'type'           => MasterSurvey::TYPE_RADIO,
                'component_name' => null,
                'default_value'  => null,
                'attribute'      => null,
                'rule'           => null,
                'options'        => [
                    [
                        'label' => 'Ya',
                        'value' => 'Ya'
                    ],
                    [
                        'label' => 'Tidak',
                        'value' => 'Tidak'
                    ]
                ]
            ],
            [
                'label'          => 'Lesi-Lesi Lainnya',
                'key'            => 'value',
                'type'           => MasterSurvey::TYPE_RADIO,
                'component_name' => null,
                'default_value'  => null,
                'attribute'      => null,
                'rule'           => null,
                'options'        => [
                    [
                        'label' => 'Ya',
                        'value' => 'Ya'
                    ],
                    [
                        'label' => 'Tidak',
                        'value' => 'Tidak'
                    ]
                ]
            ],
            [
                'label'          => 'Lidah Kotor',
                'key'            => 'value',
                'type'           => MasterSurvey::TYPE_RADIO,
                'component_name' => null,
                'default_value'  => null,
                'attribute'      => null,
                'rule'           => null,
                'options'        => [
                    [
                        'label' => 'Ya',
                        'value' => 'Ya'
                    ],
                    [
                        'label' => 'Tidak',
                        'value' => 'Tidak'
                    ]
                ]
            ],
            [
                'label'          => 'Luka pada sudut mulut',
                'key'            => 'value',
                'type'           => MasterSurvey::TYPE_RADIO,
                'component_name' => null,
                'default_value'  => null,
                'attribute'      => null,
                'rule'           => null,
                'options'        => [
                    [
                        'label' => 'Ya',
                        'value' => 'Ya'
                    ],
                    [
                        'label' => 'Tidak',
                        'value' => 'Tidak'
                    ]
                ]
            ]
        ]
    ]
];
