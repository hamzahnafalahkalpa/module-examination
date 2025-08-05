<?php

use Hanafalah\ModuleExamination\Models\Form\Survey;

return [
    'label'  => 'PostpartumObservation',
    'name'  => 'PELAYANAN KESEHATAN IBU NIFAS',
    'dynamic_forms'  => [
        [
            'label'          => 'Menanyakan kondisi ibu nifas secara umum',
            'key'            => 'value',
            'type'           => Survey::TYPE_RADIO,
            'component_name' => null,
            'default_value'  => null,
            'attribute'      => null,
            'rule'           => null,
            'options'        => [
                [
                    'label' => 'Dilakukan',
                    'value' => 'Dilakukan'
                ],
                [
                    'label' => 'Dilakukan sesuai indikasi',
                    'value' => 'Dilakukan sesuai indikasi'
                ],
                [
                    'label' => 'Tidak dilakukan',
                    'value' => 'Tidak dilakukan'
                ]
            ]
        ],
        [
            'label'          => 'Pengukuran tekanan darah, suhu tubuh, pernafasan, dan nadi',
            'key'            => 'value',
            'type'           => Survey::TYPE_RADIO,
            'component_name' => null,
            'default_value'  => null,
            'attribute'      => null,
            'rule'           => null,
            'options'        => [
                [
                    'label' => 'Dilakukan',
                    'value' => 'Dilakukan'
                ],
                [
                    'label' => 'Dilakukan sesuai indikasi',
                    'value' => 'Dilakukan sesuai indikasi'
                ],
                [
                    'label' => 'Tidak dilakukan',
                    'value' => 'Tidak dilakukan'
                ]
            ]
        ],
        [
            'label'          => 'Pemeriksaan lokhia dan perdarahan',
            'key'            => 'value',
            'type'           => Survey::TYPE_RADIO,
            'component_name' => null,
            'default_value'  => null,
            'attribute'      => null,
            'rule'           => null,
            'options'        => [
                [
                    'label' => 'Dilakukan',
                    'value' => 'Dilakukan'
                ],
                [
                    'label' => 'Dilakukan sesuai indikasi',
                    'value' => 'Dilakukan sesuai indikasi'
                ],
                [
                    'label' => 'Tidak dilakukan',
                    'value' => 'Tidak dilakukan'
                ]
            ]
        ],
        [
            'label'          => 'Pemeriksaan kondisi jalan lahir dan tanda infeksi',
            'key'            => 'value',
            'type'           => Survey::TYPE_RADIO,
            'component_name' => null,
            'default_value'  => null,
            'attribute'      => null,
            'rule'           => null,
            'options'        => [
                [
                    'label' => 'Dilakukan',
                    'value' => 'Dilakukan'
                ],
                [
                    'label' => 'Dilakukan sesuai indikasi',
                    'value' => 'Dilakukan sesuai indikasi'
                ],
                [
                    'label' => 'Tidak dilakukan',
                    'value' => 'Tidak dilakukan'
                ]
            ]
        ],
        [
            'label'          => 'Pemeriksaan kontraksi rahim dan tinggi fundus uteri',
            'key'            => 'value',
            'type'           => Survey::TYPE_RADIO,
            'component_name' => null,
            'default_value'  => null,
            'attribute'      => null,
            'rule'           => null,
            'options'        => [
                [
                    'label' => 'Dilakukan',
                    'value' => 'Dilakukan'
                ],
                [
                    'label' => 'Dilakukan sesuai indikasi',
                    'value' => 'Dilakukan sesuai indikasi'
                ],
                [
                    'label' => 'Tidak dilakukan',
                    'value' => 'Tidak dilakukan'
                ]
            ]
        ],
        [
            'label'          => 'Pemeriksaan payudara dan anjuran pemberian ASI eksklusif',
            'key'            => 'value',
            'type'           => Survey::TYPE_RADIO,
            'component_name' => null,
            'default_value'  => null,
            'attribute'      => null,
            'rule'           => null,
            'options'        => [
                [
                    'label' => 'Dilakukan',
                    'value' => 'Dilakukan'
                ],
                [
                    'label' => 'Dilakukan sesuai indikasi',
                    'value' => 'Dilakukan sesuai indikasi'
                ],
                [
                    'label' => 'Tidak dilakukan',
                    'value' => 'Tidak dilakukan'
                ]
            ]
        ],
        [
            'label'          => 'Pemberian kapsul vitamin A (2 kapsul)',
            'key'            => 'value',
            'type'           => Survey::TYPE_RADIO,
            'component_name' => null,
            'default_value'  => null,
            'attribute'      => null,
            'rule'           => null,
            'options'        => [
                [
                    'label' => 'Dilakukan',
                    'value' => 'Dilakukan'
                ],
                [
                    'label' => 'Dilakukan sesuai indikasi',
                    'value' => 'Dilakukan sesuai indikasi'
                ],
                [
                    'label' => 'Tidak dilakukan',
                    'value' => 'Tidak dilakukan'
                ]
            ]
        ],
        [
            'label'          => 'Pelayanan kontrasepsi pasca persalinan',
            'key'            => 'value',
            'type'           => Survey::TYPE_RADIO,
            'component_name' => null,
            'default_value'  => null,
            'attribute'      => null,
            'rule'           => null,
            'options'        => [
                [
                    'label' => 'Dilakukan',
                    'value' => 'Dilakukan'
                ],
                [
                    'label' => 'Dilakukan sesuai indikasi',
                    'value' => 'Dilakukan sesuai indikasi'
                ],
                [
                    'label' => 'Tidak dilakukan',
                    'value' => 'Tidak dilakukan'
                ]
            ]
        ],
        [
            'label'          => 'Konseling',
            'key'            => 'value',
            'type'           => Survey::TYPE_RADIO,
            'component_name' => null,
            'default_value'  => null,
            'attribute'      => null,
            'rule'           => null,
            'options'        => [
                [
                    'label' => 'Dilakukan',
                    'value' => 'Dilakukan'
                ],
                [
                    'label' => 'Dilakukan sesuai indikasi',
                    'value' => 'Dilakukan sesuai indikasi'
                ],
                [
                    'label' => 'Tidak dilakukan',
                    'value' => 'Tidak dilakukan'
                ]
            ]
        ],
        [
            'label'          => 'Tatalaksana pada ibu nifas sakit atau ibu nifas dengan komplikasi',
            'key'            => 'value',
            'type'           => Survey::TYPE_RADIO,
            'component_name' => null,
            'default_value'  => null,
            'attribute'      => null,
            'rule'           => null,
            'options'        => [
                [
                    'label' => 'Dilakukan',
                    'value' => 'Dilakukan'
                ],
                [
                    'label' => 'Dilakukan sesuai indikasi',
                    'value' => 'Dilakukan sesuai indikasi'
                ],
                [
                    'label' => 'Tidak dilakukan',
                    'value' => 'Tidak dilakukan'
                ]
            ]
        ],
        [
            'label'          => 'Memberikan nasehat',
            'key'            => 'value',
            'type'           => Survey::TYPE_RADIO,
            'component_name' => null,
            'default_value'  => null,
            'attribute'      => null,
            'rule'           => null,
            'options'        => [
                [
                    'label' => 'Dilakukan',
                    'value' => 'Dilakukan'
                ],
                [
                    'label' => 'Dilakukan sesuai indikasi',
                    'value' => 'Dilakukan sesuai indikasi'
                ],
                [
                    'label' => 'Tidak dilakukan',
                    'value' => 'Tidak dilakukan'
                ]
            ]
        ]
    ]
];
