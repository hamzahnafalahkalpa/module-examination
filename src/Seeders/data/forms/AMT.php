<?php



use Hanafalah\ModuleExamination\Models\Form\Survey;

return [
    'label'  => 'AMT',
    'name'  => 'ABBREVIATED MENTAL TEST (AMT)',
    'dynamic_forms'  => [
        [
            'label'          => 'Mengenali orang lain di RS. (dokter, perawat, dll)',
            'key'            => 'value',
            'type'           => Survey::TYPE_RADIO,
            'component_name' => null,
            'default_value'  => null,
            'attribute'      => null,
            'rule'           => null,
            'options'        => [
                [
                    'label' => 'Salah',
                    'value' => 0
                ],
                [
                    'label' => 'Benar',
                    'value' => 1
                ]
            ]
        ],
        [
            'label'          => 'Menghitung terbalik (20 s/d 1)',
            'key'            => 'value',
            'type'           => Survey::TYPE_RADIO,
            'component_name' => null,
            'default_value'  => null,
            'attribute'      => null,
            'rule'           => null,
            'options'        => [
                [
                    'label' => 'Salah',
                    'value' => 0
                ],
                [
                    'label' => 'Benar',
                    'value' => 1
                ]
            ]
        ],
        [
            'label'          => 'Nama Presiden RI',
            'key'            => 'value',
            'type'           => Survey::TYPE_RADIO,
            'component_name' => null,
            'default_value'  => null,
            'attribute'      => null,
            'rule'           => null,
            'options'        => [
                [
                    'label' => 'Salah',
                    'value' => 0
                ],
                [
                    'label' => 'Benar',
                    'value' => 1
                ]
            ]
        ],
        [
            'label'          => 'Saat ini berada di mana',
            'key'            => 'value',
            'type'           => Survey::TYPE_RADIO,
            'component_name' => null,
            'default_value'  => null,
            'attribute'      => null,
            'rule'           => null,
            'options'        => [
                [
                    'label' => 'Salah',
                    'value' => 0
                ],
                [
                    'label' => 'Benar',
                    'value' => 1
                ]
            ]
        ],
        [
            'label'          => 'Tahun kelahiran pasien atau anak terakhir',
            'key'            => 'value',
            'type'           => Survey::TYPE_RADIO,
            'component_name' => null,
            'default_value'  => null,
            'attribute'      => null,
            'rule'           => null,
            'options'        => [
                [
                    'label' => 'Salah',
                    'value' => 0
                ],
                [
                    'label' => 'Benar',
                    'value' => 1
                ]
            ]
        ],
        [
            'label'          => 'Umur',
            'key'            => 'value',
            'type'           => Survey::TYPE_RADIO,
            'component_name' => null,
            'default_value'  => null,
            'attribute'      => null,
            'rule'           => null,
            'options'        => [
                [
                    'label' => 'Salah',
                    'value' => 0
                ],
                [
                    'label' => 'Benar',
                    'value' => 1
                ]
            ]
        ],
        [
            'label'          => 'Tahun ini',
            'key'            => 'value',
            'type'           => Survey::TYPE_RADIO,
            'component_name' => null,
            'default_value'  => null,
            'attribute'      => null,
            'rule'           => null,
            'options'        => [
                [
                    'label' => 'Salah',
                    'value' => 0
                ],
                [
                    'label' => 'Benar',
                    'value' => 1
                ]
            ]
        ],
        [
            'label'          => 'Tahun kemerdekaan RI',
            'key'            => 'value',
            'type'           => Survey::TYPE_RADIO,
            'component_name' => null,
            'default_value'  => null,
            'attribute'      => null,
            'rule'           => null,
            'options'        => [
                [
                    'label' => 'Salah',
                    'value' => 0
                ],
                [
                    'label' => 'Benar',
                    'value' => 1
                ]
            ]
        ],
        [
            'label'          => 'Waktu / jam sekarang',
            'key'            => 'value',
            'type'           => Survey::TYPE_RADIO,
            'component_name' => null,
            'default_value'  => null,
            'attribute'      => null,
            'rule'           => null,
            'options'        => [
                [
                    'label' => 'Salah',
                    'value' => 0
                ],
                [
                    'label' => 'Benar',
                    'value' => 1
                ]
            ]
        ],
        [
            'label'          => 'Alamat tempat tinggal',
            'key'            => 'value',
            'type'           => Survey::TYPE_RADIO,
            'component_name' => null,
            'default_value'  => null,
            'attribute'      => null,
            'rule'           => null,
            'options'        => [
                [
                    'label' => 'Salah',
                    'value' => 0
                ],
                [
                    'label' => 'Benar',
                    'value' => 1
                ]
            ]
        ]
    ]
];