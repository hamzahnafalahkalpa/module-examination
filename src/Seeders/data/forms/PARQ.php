<?php

use Hanafalah\ModuleExamination\Models\Form\MasterSurvey;

return [
    'flag'  => 'PARQ',
    'name'  => 'PEMERIKSAAN PARQ',
    'props' => [
        'dynamic_forms'  => [
            [
                'label'          => 'Pernahkah dokter menyatakan bahwa anda menderita sesuatu kelainan jantung dan hanya boleh melakukan aktivitas fisik sesuai rekomendasi dokter?',
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
                'label'          => 'Apakah anda mengetahui alasan lainnya mengapa anda tidak boleh melakukan aktivitas fisik?',
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
                'label'          => 'Apakah anda pernah kehilangan keseimbangan oleh karena pusing atau hilang kesadaran?',
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
                'label'          => 'Sebulan yang lalu apakah anda pernah merasakan nyeri dada saat anda tidak melakukan aktivitas fisik?',
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
                'label'          => 'Apakah dokter memberi resep obat penurun tekanan darah atau obat untuk penyakit jantung?',
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
                'label'          => 'Apakah anda mengalami nyeri dada saat melakukan aktivitas fisik?',
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
                'label'          => 'Apakah anda punya masalah di persendian atau tulang yang akan bertambah parah bila anda melakukan aktivitas fisik?',
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
                'label'          => 'Apakah Patient Layak Mengikuti Test?',
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
