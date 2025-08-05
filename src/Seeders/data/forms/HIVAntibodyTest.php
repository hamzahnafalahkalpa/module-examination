<?php

use Hanafalah\ModuleExamination\Models\Form\Survey;

return [
    'label'  => 'HIVAntibodyTrst',
    'name'  => 'KAJIAN TINGKAT RISIKO',
    'dynamic_forms'  => [
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
                    'surveys' => [
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
