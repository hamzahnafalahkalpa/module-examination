<?php

use Hanafalah\ModuleExamination\Models\Form\MasterSurvey;

return [
    'label'  => 'TB PARU',
    'name'  => 'PEMERIKSAAN FOTO TORAKS',
    'dynamic_forms'  => [
        [
            'label'          => 'Kondisi',
            'key'            => 'value',
            'type'           => MasterSurvey::TYPE_RADIO,
            'component_name' => null,
            'default_value'  => null,
            'attribute'      => null,
            'rule'           => null,
            'options'        => [
                [
                    'label' => 'Abnormalitas TBC',
                    'value' => 'Abnormalitas TBC'
                ],
                [
                    'label' => 'Abnormalitas Bukan TBC',
                    'value' => 'Abnormalitas Bukan TBC'
                ],
                [
                    'label' => 'Normal',
                    'value' => 'Normal'
                ]
            ]
        ],
        [
            'label'          => 'Tanggal Pemeriksaan',
            'key'            => 'value',
            'type'           => MasterSurvey::TYPE_INPUT,
            'component_name' => null,
            'default_value'  => null,
            'attribute'      => [
                "type" => "date"
            ],
            'rule'           => null,
            'options'        => null
        ],
        [
            'label'          => 'No.Seri',
            'key'            => 'value',
            'type'           => MasterSurvey::TYPE_INPUT,
            'component_name' => null,
            'default_value'  => null,
            'attribute'      => [
                "type" => "text"
            ],
            'rule'           => null,
            'options'        => null
        ],
        [
            'label'          => 'Saran',
            'key'            => 'value',
            'type'           => MasterSurvey::TYPE_TEXTAREA,
            'component_name' => null,
            'default_value'  => null,
            'rule'           => null,
            'options'        => null
        ]
    ]
];
