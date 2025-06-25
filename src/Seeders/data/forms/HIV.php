<?php

use Hanafalah\ModuleExamination\Models\Form\MasterSurvey;

return [
    'flag'  => 'HIV',
    'name'  => 'KAJIAN TINGKAT RISIKO',
    'props' => [
        'dynamic_forms'  => [
            [
                'label'          => 'Hubungan seks vaginal berisiko',
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
                'label'          => 'Bergantian peralatan suntik',
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
                'label'          => 'Transmisi ibu ke anak',
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
                'label'          => 'Periode jendela',
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
                'label'          => 'Anal seks berisiko',
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
                'label'          => 'Transfusi darah',
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
                'label'          => 'Pernah tes HIV sebelumnya',
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
                'label'          => 'Kesediaan untuk test',
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
