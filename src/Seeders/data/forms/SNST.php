<?php

use Hanafalah\ModuleExamination\Models\Form\MasterSurvey;

return [
    'label'  => 'SNST',
    'name'  => 'FORMULIR GIZI SNST',
    'dynamic_forms'  => [
        [
            'label'          => 'Apakah Anda merasakan lemah, loyo dan tidak bertenaga?',
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
            'label'          => 'Apakah akhir-akhir ini Anda kehilangan berat badan secara tidak sengaja (6 bulan terakhir)?',
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
            'label'          => 'Apakah Anda mengalami penurunan asupan makan selama 1 minggu terakhir?',
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
            'label'          => 'Apakah Anda menderita suatu penyakit yang mengakibatkan adanya perubahan jumlah atau jenis makanan yang Anda makan?',
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
            'label'          => 'Apakah pakaian anda terasa lebih longgar?',
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
];
