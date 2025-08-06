<?php

use Hanafalah\ModuleExamination\Models\Form\Survey;

return [
    'label'  => 'Partus',
    'name'  => 'Persalinan',
    'dynamic_forms'  => [
        [
            'label'          => 'Kala I',
            'type'           => Survey::TYPE_CARD,
            'key'            => null,
            'component_name' => null,
            'attribute'      => null,
            'rule'           => null,
            'dynamic_forms'  => [
                [
                    'label'          => 'Partogram Melewati Garis waspada',
                    'key'            => 'value',
                    'type'           => Survey::TYPE_RADIO,
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
                    'label'          => 'Masalah Lainnya',
                    'key'            => 'value',
                    'type'           => Survey::TYPE_TEXTAREA,
                    'component_name' => null,
                    'default_value'  => null,
                    'attribute'      => null,
                    'rule'           => null
                ],
                [
                    'label'          => 'Penatalaksanaan Masalah Lainnya',
                    'key'            => 'value',
                    'type'           => Survey::TYPE_TEXTAREA,
                    'component_name' => null,
                    'default_value'  => null,
                    'attribute'      => null,
                    'rule'           => null
                ],
                [
                    'label'          => 'Hasil',
                    'key'            => 'value',
                    'type'           => Survey::TYPE_TEXTAREA,
                    'component_name' => null,
                    'default_value'  => null,
                    'attribute'      => null,
                    'rule'           => null
                ]
            ]
        ],
        [
            'label'          => 'Kala II',
            'key'            => null,
            'type'           => Survey::TYPE_CARD,
            'component_name' => null,
            'default_value'  => null,
            'attribute'      => null,
            'rule'           => null,
            'dynamic_forms'  => [
                [
                    'label'          => 'Opsiotomi',
                    'key'            => 'value',
                    'type'           => Survey::TYPE_RADIO,
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
                    'label'          => 'Indikasi Opsiotomi',
                    'key'            => 'value',
                    'type'           => Survey::TYPE_INPUT,
                    'component_name' => null,
                    'default_value'  => null,
                    'attribute'      => null,
                    'rule'           => null
                ],
                [
                    'label'          => 'Pendamping pada saat kehamilan',
                    'key'            => 'value',
                    'type'           => Survey::TYPE_INPUT,
                    'component_name' => null,
                    'default_value'  => null,
                    'attribute'      => null,
                    'rule'           => null
                ],
                [
                    'label'          => 'Masalah Lainnya',
                    'key'            => 'value',
                    'type'           => Survey::TYPE_TEXTAREA,
                    'component_name' => null,
                    'default_value'  => null,
                    'attribute'      => null,
                    'rule'           => null
                ],
                [
                    'label'          => 'Penatalaksanaan Masalah Lainnya',
                    'key'            => 'value',
                    'type'           => Survey::TYPE_TEXTAREA,
                    'component_name' => null,
                    'default_value'  => null,
                    'attribute'      => null,
                    'rule'           => null
                ],
                [
                    'label'          => 'Hasil',
                    'key'            => 'value',
                    'type'           => Survey::TYPE_TEXTAREA,
                    'component_name' => null,
                    'default_value'  => null,
                    'attribute'      => null,
                    'rule'           => null
                ]
            ]
        ],
        [
            'label'          => 'Kala III',
            'key'            => 'value',
            'type'           => Survey::TYPE_CARD,
            'component_name' => null,
            'default_value'  => null,
            'attribute'      => null,
            'rule'           => null,
            'dynamic_forms'  => [
                [
                    'label'          => 'Lama Kala III /menit',
                    'key'            => 'value',
                    'type'           => Survey::TYPE_INPUT,
                    'component_name' => null,
                    'default_value'  => null,
                    'attribute'      => [
                        'input_type' => 'number'
                    ],
                    'rule'           => null,
                ],
                [
                    'label'          => 'Pemberian Oksitosin 10 IU im ?',
                    'key'            => 'value',
                    'type'           => Survey::TYPE_RADIO,
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
                    'label'          => 'Jika Laserasi perineum, derajat ?',
                    'key'            => 'value',
                    'type'           => Survey::TYPE_RADIO,
                    'component_name' => null,
                    'default_value'  => null,
                    'attribute'      => null,
                    'rule'           => null,
                    'options'        => [
                        [
                            'label' => 'Derajat 1',
                            'value' => 'Derajat 1'
                        ],
                        [
                            'label' => 'Derajat 2',
                            'value' => 'Derajat 2'
                        ],
                        [
                            'label' => 'Derajat 3',
                            'value' => 'Derajat 3'
                        ],
                        [
                            'label' => 'Derajat 4',
                            'value' => 'Derajat 4'
                        ]
                    ]
                ],
                [
                    'label'          => 'Pemberian Oksitosin 2x',
                    'key'            => 'value',
                    'type'           => Survey::TYPE_RADIO,
                    'component_name' => null,
                    'default_value'  => null,
                    'attribute'      => null,
                    'rule'           => null,
                    'options'        => [
                        [
                            'label' => 'Ya',
                            'value' => 'Ya',
                            'dynamic_forms' => [
                                [
                                    'label'          => 'Alasan',
                                    'key'            => 'value',
                                    'type'           => Survey::TYPE_INPUT,
                                    'component_name' => null,
                                    'default_value'  => null,
                                    'attribute'      => null,
                                    'rule'           => null
                                ]
                            ]
                        ],
                        [
                            'label' => 'Tidak',
                            'value' => 'Tidak'
                        ]
                    ]
                ],
                [
                    'label'          => 'Penegangan tali pusat terkendali ?',
                    'key'            => 'value',
                    'type'           => Survey::TYPE_RADIO,
                    'component_name' => null,
                    'default_value'  => null,
                    'attribute'      => null,
                    'rule'           => null,
                    'options'        => [
                        [
                            'label' => 'Ya',
                            'value' => 'Ya',
                            'dynamic_forms' => [
                                [
                                    'label'          => 'Alasan',
                                    'key'            => 'value',
                                    'type'           => Survey::TYPE_INPUT,
                                    'component_name' => null,
                                    'default_value'  => null,
                                    'attribute'      => null,
                                    'rule'           => null
                                ]
                            ]
                        ],
                        [
                            'label' => 'Tidak',
                            'value' => 'Tidak'
                        ]
                    ]
                ],
                [
                    'label'          => 'Masase fundus uteri ?',
                    'key'            => 'value',
                    'type'           => Survey::TYPE_RADIO,
                    'component_name' => null,
                    'default_value'  => null,
                    'attribute'      => null,
                    'rule'           => null,
                    'options'        => [
                        [
                            'label' => 'Ya',
                            'value' => 'Ya',
                            'dynamic_forms' => [
                                [
                                    'label'          => 'Alasan',
                                    'key'            => 'value',
                                    'type'           => Survey::TYPE_INPUT,
                                    'component_name' => null,
                                    'default_value'  => null,
                                    'attribute'      => null,
                                    'rule'           => null
                                ]
                            ]
                        ],
                        [
                            'label' => 'Tidak',
                            'value' => 'Tidak'
                        ]
                    ]
                ],
                [
                    'label'          => 'Masalah Lainnya',
                    'key'            => 'value',
                    'type'           => Survey::TYPE_TEXTAREA,
                    'component_name' => null,
                    'default_value'  => null,
                    'attribute'      => null,
                    'rule'           => null
                ],
                [
                    'label'          => 'Penatalaksanaan Masalah Lainnya',
                    'key'            => 'value',
                    'type'           => Survey::TYPE_TEXTAREA,
                    'component_name' => null,
                    'default_value'  => null,
                    'attribute'      => null,
                    'rule'           => null
                ],
                [
                    'label'          => 'Hasil',
                    'key'            => 'value',
                    'type'           => Survey::TYPE_TEXTAREA,
                    'component_name' => null,
                    'default_value'  => null,
                    'attribute'      => null,
                    'rule'           => null
                ]
            ]
        ],
        [
            'label'          => 'Kala IV',
            'key'            => 'value',
            'type'           => Survey::TYPE_CARD,
            'component_name' => null,
            'default_value'  => null,
            'attribute'      => null,
            'rule'           => null,
            'dynamic_forms'  => [
                [
                    'label'          => 'Riwayat Pemantauan',
                    'key'            => 'value',
                    'type'           => Survey::TYPE_MULTIPLE_FORM,
                    'component_name' => null,
                    'default_value'  => null,
                    'attribute'      => null,
                    'rule'           => null,
                    'dynamic_forms'  => [
                        [
                            'label'          => 'Jam Pemantauan',
                            'key'            => 'value',
                            'type'           => Survey::TYPE_TIME,
                            'component_name' => null,
                            'default_value'  => null,
                            'attribute'      => null,
                            'rule'           => null,
                        ],
                        [
                            'label'          => 'Tanda Tanda Vital',
                            'key'            => 'value',
                            'type'           => Survey::TYPE_TEXTAREA,
                            'component_name' => null,
                            'default_value'  => "
                                Tekanan Darah:\n
                                Nadi:\n
                                Suhu °C:\n
                                Tinggi Fundus:\n
                                Kontraksi Uteris:\n
                                Kandung Kemih:\n
                                Pendarahan: \n
                            ",
                            'attribute'      => null,
                            'rule'           => null,
                        ]
                    ]
                ],
                [
                    'label'          => 'Masalah Lainnya',
                    'key'            => 'value',
                    'type'           => Survey::TYPE_TEXTAREA,
                    'component_name' => null,
                    'default_value'  => null,
                    'attribute'      => null,
                    'rule'           => null
                ],
                [
                    'label'          => 'Penatalaksanaan Masalah Lainnya',
                    'key'            => 'value',
                    'type'           => Survey::TYPE_TEXTAREA,
                    'component_name' => null,
                    'default_value'  => null,
                    'attribute'      => null,
                    'rule'           => null
                ],
                [
                    'label'          => 'Hasil',
                    'key'            => 'value',
                    'type'           => Survey::TYPE_TEXTAREA,
                    'component_name' => null,
                    'default_value'  => null,
                    'attribute'      => null,
                    'rule'           => null
                ]
            ]
        ],
        [
            'label'          => 'Partus',
            'key'            => 'value',
            'type'           => Survey::TYPE_CARD,
            'component_name' => null,
            'default_value'  => null,
            'attribute'      => null,
            'rule'           => null,
            'dynamic_forms'        => [
                [
                    'label'          => 'Waktu Bersalin',
                    'key'            => 'value',
                    'type'           => Survey::TYPE_DATE_TIME,
                    'component_name' => null,
                    'default_value'  => null,
                    'attribute'      => null,
                    'rule'           => null
                ],
                [
                    'label'          => 'Umur Kehamilan (minggu)',
                    'key'            => 'value',
                    'type'           => Survey::TYPE_INPUT,
                    'component_name' => null,
                    'default_value'  => null,
                    'attribute'      => [
                        'input_type' => 'number',
                    ],
                    'rule'           => null
                ],
                [
                    'label'          => 'Keadaan Ibu',
                    'key'            => 'value',
                    'type'           => Survey::TYPE_RADIO,
                    'component_name' => null,
                    'default_value'  => null,
                    'attribute'      => null,
                    'rule'           => null,
                    'options'        => [
                        [
                            'label' => 'Sehat',
                            'value' => 'Sehat'
                        ],
                        [
                            'label' => 'Sakit',
                            'value' => 'Sakit'
                        ],
                        [
                            'label' => 'Meninggal',
                            'value' => 'Meninggal'
                        ]
                    ]
                ],
                [
                    'label'          => 'Jenis Persalinan',
                    'key'            => 'value',
                    'type'           => Survey::TYPE_INPUT,
                    'component_name' => null,
                    'default_value'  => null,
                    'attribute'      => null,
                    'rule'           => null
                ],
                [
                    'label'          => 'Masalah Lainnya',
                    'key'            => 'value',
                    'type'           => Survey::TYPE_TEXTAREA,
                    'component_name' => null,
                    'default_value'  => null,
                    'attribute'      => null,
                    'rule'           => null
                ],
                [
                    'label'          => 'Penatalaksanaan Masalah Lainnya',
                    'key'            => 'value',
                    'type'           => Survey::TYPE_TEXTAREA,
                    'component_name' => null,
                    'default_value'  => null,
                    'attribute'      => null,
                    'rule'           => null
                ],
                [
                    'label'          => 'Hasil',
                    'key'            => 'value',
                    'type'           => Survey::TYPE_TEXTAREA,
                    'component_name' => null,
                    'default_value'  => null,
                    'attribute'      => null,
                    'rule'           => null
                ]
            ]
        ]
    ]
];
