<?php

use Hanafalah\ModuleExamination\Models\Form\Survey;

return [
    'label'  => 'HIV',
    'name'  => 'KAJIAN TINGKAT RISIKO',
    'dynamic_forms'  => [
        [
            'label'          => 'Punya Pasangan',
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
            'label'          => 'Nama Pasangan',
            'key'            => 'value',
            'type'           => Survey::TYPE_INPUT,
            'component_name' => null,
            'default_value'  => null,
            'attribute'      => null,
            'rule'           => null,
            'options'        => [
            ]
        ],
        [
            'label'          => 'Apakah Pasangan Hamil',
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
                ],
                [
                    'label' => 'Tidak Tahu',
                    'value' => 'Tidak Tahu'
                ]
            ]
        ],
        [
            'label'          => 'Kondisi Pasangan Saat Ini',
            'key'            => 'value',
            'type'           => Survey::TYPE_RADIO,
            'component_name' => null,
            'default_value'  => null,
            'attribute'      => null,
            'rule'           => null,
            'options'        => [
                [
                    'label' => 'Positif HIV',
                    'value' => 'Positif HIV',
                ],
                [
                    'label' => 'Negatif HIV',
                    'value' => 'Negatif HIV'
                ],
                [
                    'label' => 'Tidak Tahu',
                    'value' => 'Tidak Tahu'
                ]
            ]
        ],
        [
            'label'          => 'Penyimpanan/Kelompok Berisiko Penularan',
            'key'            => 'value',
            'type'           => Survey::TYPE_SELECT,
            'component_name' => null,
            'default_value'  => null,
            'attribute'      => null,
            'rule'           => null,
            'options'        => [
                ['label' => "Pekerja Seks Komersial (PSK)",'value' => "Pekerja Seks Komersial (PSK)"],
                ['label' => "Pelanggan Pekerja Seks",'value' => "Pelanggan Pekerja Seks"],
                ['label' => "Lelaki yang berhubungan seks dengan lelaki (LSL/MSM)",'value' => "Lelaki yang berhubungan seks dengan lelaki (LSL/MSM)"],
                ['label' => "Waria",'value' => "Waria"],
                ['label' => "Pasangan dari orang dengan HIV/AIDS (ODHA)",'value' => "Pasangan dari orang dengan HIV/AIDS (ODHA)"],
                ['label' => "Orang dengan pasangan seks berganti-ganti",'value' => "Orang dengan pasangan seks berganti-ganti"],
                ['label' => "Pengguna Napza Suntik (penasun)",'value' => "Pengguna Napza Suntik (penasun)"],
                ['label' => "Orang yang menerima transfusi darah tidak aman",'value' => "Orang yang menerima transfusi darah tidak aman"],
                ['label' => "Bayi yang lahir dari ibu HIV positif",'value' => "Bayi yang lahir dari ibu HIV positif"],
                ['label' => "Remaja dengan perilaku seksual berisiko",'value' => "Remaja dengan perilaku seksual berisiko"],
                ['label' => "Narapidana atau tahanan",'value' => "Narapidana atau tahanan"],
                ['label' => "Pekerja migran dengan akses kesehatan terbatas",'value' => "Pekerja migran dengan akses kesehatan terbatas"],
                ['label' => "Tenaga kesehatan yang terpapar cairan tubuh (jarum suntik dll)",'value' => "Tenaga kesehatan yang terpapar cairan tubuh (jarum suntik dll)"]
            ]
        ],
        [
            'label'          => 'Populasi Khusus/Warga Binaan Permasyarakatan (WBP)',
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
                ],
                [
                    'label' => 'Tidak',
                    'value' => 'Tidak'
                ]
            ]
        ],
        [
            'label'          => 'Apakah pasien penderita baru',
            'key'            => 'value',
            'type'           => Survey::TYPE_RADIO,
            'component_name' => null,
            'default_value'  => null,
            'attribute'      => null,
            'rule'           => null,
            'options'        => [
                [
                    'label' => 'Baru',
                    'value' => 'Baru',
                ],
                [
                    'label' => 'Lama',
                    'value' => 'Lama'
                ]
            ]
        ],
        [
            'label'          => 'Alasan Tes HIV',
            'key'            => 'value',
            'type'           => Survey::TYPE_TEXTAREA,
            'component_name' => null,
            'default_value'  => null,
            'attribute'      => null,
            'rule'           => null,
            'options'        => [
            ]
        ],
        [
            'label'          => 'Hubungan seks vaginal berisiko',
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
                            'label'          => 'Tanggal',
                            'key'            => 'value',
                            'type'           => Survey::TYPE_DATE,
                            'component_name' => null,
                            'default_value'  => null,
                            'attribute'      => null,
                            'rule'           => null,
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
            'label'          => 'Bergantian peralatan suntik',
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
                            'label'          => 'Tanggal',
                            'key'            => 'value',
                            'type'           => Survey::TYPE_DATE,
                            'component_name' => null,
                            'default_value'  => null,
                            'attribute'      => null,
                            'rule'           => null,
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
            'label'          => 'Transmisi ibu ke anak',
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
                            'label'          => 'Tanggal',
                            'key'            => 'value',
                            'type'           => Survey::TYPE_DATE,
                            'component_name' => null,
                            'default_value'  => null,
                            'attribute'      => null,
                            'rule'           => null,
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
            'label'          => 'Periode jendela',
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
                            'label'          => 'Tanggal',
                            'key'            => 'value',
                            'type'           => Survey::TYPE_DATE,
                            'component_name' => null,
                            'default_value'  => null,
                            'attribute'      => null,
                            'rule'           => null,
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
            'label'          => 'Anal seks berisiko',
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
                            'label'          => 'Tanggal',
                            'key'            => 'value',
                            'type'           => Survey::TYPE_DATE,
                            'component_name' => null,
                            'default_value'  => null,
                            'attribute'      => null,
                            'rule'           => null,
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
            'label'          => 'Transfusi darah',
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
                            'label'          => 'Tanggal',
                            'key'            => 'value',
                            'type'           => Survey::TYPE_DATE,
                            'component_name' => null,
                            'default_value'  => null,
                            'attribute'      => null,
                            'rule'           => null,
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
            'label'          => 'Pernah tes HIV sebelumnya',
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
                            'label'          => 'Lokasi tes HIV sebelumnya',
                            'key'            => 'value',
                            'type'           => Survey::TYPE_INPUT,
                            'component_name' => null,
                            'default_value'  => null,
                            'attribute'      => null,
                            'rule'           => null,
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
            'label'          => 'Kesediaan untuk test',
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
                    'forms' => [
                        'HIVAntibodyTest'
                    ]
                ],
                [
                    'label' => 'Tidak',
                    'value' => 'Tidak'
                ]
            ]
        ]
    ]
];
