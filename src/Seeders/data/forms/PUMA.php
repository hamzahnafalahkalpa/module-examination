<?php

use Hanafalah\ModuleExamination\Models\Form\MasterSurvey;

return [
    'flag'  => 'MNA',
    'name'  => 'PENGKAJIAN NUTRISI (SHORT FROM MNA)',
    'props' => [
        'dynamic_forms'  => [
            [
                'label'          => 'Apakah peserta pernah merokok?',
                'key'            => 'value',
                'type'           => MasterSurvey::TYPE_RADIO,
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
                'label'          => 'Berapa rata-rata jumlah batang rokok per hari?',
                'key'            => 'value',
                'type'           => MasterSurvey::TYPE_INPUT,
                'component_name' => null,
                'default_value'  => null,
                'attribute'      => [
                    'input_type'    => 'number'
                ],
                'rule'           => null
            ],
            [
                'label'          => 'Lama merokok dalam tahun',
                'key'            => 'value',
                'type'           => MasterSurvey::TYPE_INPUT,
                'component_name' => null,
                'default_value'  => null,
                'attribute'      => [
                    'input_type'    => 'number'
                ],
                'rule'           => null
            ],
            [
                'label'          => 'Apakah Dokter atau tenaga medis lainnya pernah meminta peserta untuk melakukan pemeriksaan spirometri atau
                peak flow meter (meniup ke dalam suatu alat) untuk mengetahui fungsi paru peserta?',
                'key'            => 'value',
                'type'           => MasterSurvey::TYPE_RADIO,
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
                'label'          => 'Apakah peserta pernah merasa napas pendek ketika peserta berjalan lebih cepat pada jalan yang datar atau
                pada jalan yang sedikit menanjak?',
                'key'            => 'value',
                'type'           => MasterSurvey::TYPE_RADIO,
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
                'label'          => 'Apakah peserta biasanya batuk saat peserta sedang tidak menderita selesma/flu?',
                'key'            => 'value',
                'type'           => MasterSurvey::TYPE_RADIO,
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
                'label'          => 'Status merokok',
                'key'            => 'value',
                'type'           => MasterSurvey::TYPE_RADIO,
                'component_name' => null,
                'default_value'  => null,
                'attribute'      => null,
                'rule'           => null,
                'options'        => [
                    [
                        'label' => 'Merokok',
                        'value' => 1
                    ],
                    [
                        'label' => 'Tidak merokok',
                        'value' => 0
                    ]
                ]
            ],
            [
                'label'          => 'Apakah peserta biasanya mempunyai dahak yang berasal dari paru atau kesulitan mengeluarkan dahak saat
                peserta sedang tidak menderita selesma/flu?',
                'key'            => 'value',
                'type'           => MasterSurvey::TYPE_RADIO,
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
            ]
        ]
    ]
];
