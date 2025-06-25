<?php

use Gii\PuskesmasModuleExamination\Models\Form\MasterSurvey;

return [
    'flag'  => 'TB PARU',
    'name'  => 'FAKTOR RISIKO TBC',
    'props' => [
        'dynamic_forms'  => [
            [
                'label'          => 'Pernah Terdiagnosis / Berobat TBC?',
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
                'label'          => 'Ibu Hamil',
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
                'label'          => 'ODHIV',
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
                'label'          => 'Pernah Berobat TBC, tapi tidak tuntas?',
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
                'label'          => 'Lansian > 65',
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
                'label'          => 'Tinggal diwilayah kumuh miskin ?',
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
                'label'          => 'Merokok / Peroko Pasif',
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
                'label'          => 'Riwayat DM / Kencing Manis',
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
                'label'          => 'Malnutrisi',
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
                'label'          => 'Warga Binaan Pemastarakatam (WBP)',
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
