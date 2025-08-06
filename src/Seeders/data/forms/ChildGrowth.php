<?php

use Hanafalah\ModuleExamination\Models\Form\Survey;

return [
    'label'  => 'ChildGrowth',
    'name'  => 'TUMBUH KEMBANG ANAK',
    'dynamic_forms'  => [
        [
            'label'          => 'PB/TB Berdasarkan Usia',
            'key'            => 'value',
            'type'           => Survey::TYPE_RADIO,
            'component_name' => null,
            'default_value'  => null,
            'attribute'      => null,
            'rule'           => null,
            'options'        => [
                [
                    'label' => 'Sangat Pendek',
                    'value' => 1
                ],
                [
                    'label' => 'Pendek',
                    'value' => 2
                ],
                [
                    'label' => 'Normal',
                    'value' => 3
                ],
                [
                    'label' => 'Tinggi',
                    'value' => 4
                ]
            ]
        ],
        [
            'label'          => 'GPPH',
            'key'            => 'value',
            'type'           => Survey::TYPE_RADIO,
            'component_name' => null,
            'default_value'  => null,
            'attribute'      => null,
            'rule'           => null,
            'options'        => [
                [
                    'label' => 'Kemungkinan GPPH',
                    'value' => 1
                ],
                [
                    'label' => 'Normal',
                    'value' => 2
                ]
            ]
        ],
        [
            'label'          => 'Autisme',
            'key'            => 'value',
            'type'           => Survey::TYPE_RADIO,
            'component_name' => null,
            'default_value'  => null,
            'attribute'      => null,
            'rule'           => null,
            'options'        => [
                [
                    'label' => 'Risiko Tinggi',
                    'value' => 1
                ],
                [
                    'label' => 'Berisiko Autisme',
                    'value' => 2
                ],
                [
                    'label' => 'Risiko Normal',
                    'value' => 3
                ]
            ]
        ],
        [
            'label'          => 'Konseling stimulasi bagi ibu/pengasuh',
            'key'            => 'value',
            'type'           => Survey::TYPE_RADIO,
            'component_name' => null,
            'default_value'  => null,
            'attribute'      => null,
            'rule'           => null,
            'options'        => [
                [
                    'label' => 'Tidak Diberikan',
                    'value' => 1
                ],
                [
                    'label' => 'Diberikan (Minimal)',
                    'value' => 2
                ],
                [
                    'label' => 'Diberikan Sesuai Kebutuhan (Normal)',
                    'value' => 3
                ],
                [
                    'label' => 'Diberikan Secara Intensif (Tinggi)',
                    'value' => 4
                ]
            ]
        ],
        [
            'label'          => 'Intervensi Stimulasi Perkembangan',
            'key'            => 'value',
            'type'           => Survey::TYPE_RADIO,
            'component_name' => null,
            'default_value'  => null,
            'attribute'      => null,
            'rule'           => null,
            'options'        => [
                [
                    'label' => 'Gerak kasar',
                    'value' => 1
                ],
                [
                    'label' => 'Gerak Halus',
                    'value' => 2
                ],
                [
                    'label' => 'Bicara dan Bahasa',
                    'value' => 3
                ],
                [
                    'label' => 'Sosialisasi & Kemandirian',
                    'value' => 4
                ]
            ]
        ]
    ]
];