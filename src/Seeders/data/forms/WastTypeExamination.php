<?php

use Hanafalah\ModuleExamination\Models\Form\MasterSurvey;

return [
    'flag'  => 'WAST TYPE',
    'name'  => 'JENIS KEKERASAN TERHADAP PEREMPUAN',
    'props' => [
        'dynamic_forms'  => [
            [
                'label'          => 'Kekerasan Psikis',
                'key'            => 'value',
                'type'           => MasterSurvey::TYPE_CHECKBOX,
                'component_name' => null,
                'default_value'  => null,
                'attribute'      => null,
                'rule'           => null,
                'options'        => [
                    [
                        'label' => 'Kekerasan Psikis',
                        'value' => 'Kekerasan Psikis'
                    ],
                    [
                        'label' => 'Diskriminatif',
                        'value' => 'Diskriminatif'
                    ],
                    [
                        'label' => 'Lainnya',
                        'value' => 'Lainnya'
                    ]
                ]
            ],
            [
                'label'          => 'Kekerasan Psikis Lainnya',
                'key'            => 'value',
                'type'           => MasterSurvey::TYPE_INPUT,
                'component_name' => null,
                'default_value'  => null,
                'attribute'      => [
                    'placeholder' => 'Lainnya',
                    'type'        => 'text'
                ],
                'rule'           => null,
                'options'        => null
            ],
            [
                'label'          => 'Kekerasan Fisik',
                'key'            => 'value',
                'type'           => MasterSurvey::TYPE_CHECKBOX,
                'component_name' => null,
                'default_value'  => null,
                'attribute'      => null,
                'rule'           => null,
                'options'        => [
                    [
                        'label' => 'Tumpul',
                        'value' => 'Tumpul'
                    ],
                    [
                        'label' => 'Tajam',
                        'value' => 'Tajam'
                    ],
                    [
                        'label' => 'Luka Bakar',
                        'value' => 'Luka Bakar'
                    ],
                    [
                        'label' => 'Eskploitasi',
                        'value' => 'Eskploitasi'
                    ],
                    [
                        'label' => 'Lainnya',
                        'value' => 'Lainnya'
                    ]
                ]
            ],
            [
                'label'          => 'Kekerasan Fisik Lainnya',
                'key'            => 'value',
                'type'           => MasterSurvey::TYPE_INPUT,
                'component_name' => null,
                'default_value'  => null,
                'attribute'      => [
                    'placeholder' => 'Lainnya',
                    'type'        => 'text'
                ],
                'rule'           => null,
                'options'        => null
            ],
            [
                'label'          => 'Kekerasan Seksual',
                'key'            => 'value',
                'type'           => MasterSurvey::TYPE_CHECKBOX,
                'component_name' => null,
                'default_value'  => null,
                'attribute'      => null,
                'rule'           => null,
                'options'        => [
                    [
                        'label' => 'Pencabulan',
                        'value' => 'Pencabulan'
                    ],
                    [
                        'label' => 'Perkosaan',
                        'value' => 'Perkosaan'
                    ],
                    [
                        'label' => 'Eksploitasi',
                        'value' => 'Eksploitasi'
                    ],
                    [
                        'label' => 'Lainnya',
                        'value' => 'Lainnya'
                    ]
                ]
            ],
            [
                'label'          => 'Kekerasan Seksual Lainnya',
                'key'            => 'value',
                'type'           => MasterSurvey::TYPE_INPUT,
                'component_name' => null,
                'default_value'  => null,
                'attribute'      => [
                    'placeholder' => 'Lainnya',
                    'type'        => 'text'
                ],
                'rule'           => null,
                'options'        => null
            ]
        ]
    ]
];
