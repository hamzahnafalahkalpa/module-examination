<?php

use Hanafalah\ModuleExamination\Models\Form\MasterSurvey;

return [
    'flag'  => 'TB PARU',
    'name'  => 'PEMERIKSAAN RIWAYAT KONTAK TBC',
    'props' => [
        'dynamic_forms'  => [
            [
                'label'          => 'Apakah Pasien memiliki Riwayat Kontak TBC?',
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
                'label'          => 'Sebutkan Jenis Kontak TBC',
                'key'            => 'value',
                'type'           => MasterSurvey::TYPE_RADIO,
                'component_name' => null,
                'default_value'  => null,
                'attribute'      => null,
                'rule'           => null,
                'options'        => [
                    [
                        'label' => 'TBC Paru Bakteriologis',
                        'value' => 'TBC Paru Bakteriologis'
                    ],
                    [
                        'label' => 'Klinis',
                        'value' => 'Klinis'
                    ],
                    [
                        'label' => 'Ekstra Paru',
                        'value' => 'Ekstra Paru'
                    ]
                ]
            ]
        ]
    ]
];
