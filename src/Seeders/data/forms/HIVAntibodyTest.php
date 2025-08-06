<?php 

use Hanafalah\ModuleExamination\Models\Form\Survey;

return [
    'label' => 'HIVAntibodyTest',
    'name' => 'HIV Antibody Test',
    'dynamic_forms' => [
        [
            'label' => 'Tanggal Pemeriksaan',
            'key' => 'value',
            'type' => Survey::TYPE_DATE,
            'component_name' => null,
            'default_value' => null,
            'attribute' => null,
            'rule' => null,
            'options' => null
        ],
        [
            'label' => 'Jenis Tes HIV',
            'key' => 'value',
            'type' => Survey::TYPE_INPUT, // bebas diisi
            'component_name' => null,
            'default_value' => null,
            'attribute' => null,
            'rule' => null,
            'options' => null
        ],
        [
            'label' => 'Urutan Tes',
            'key' => 'value',
            'type' => Survey::TYPE_SELECT,
            'component_name' => null,
            'default_value' => null,
            'attribute' => null,
            'rule' => null,
            'options' => [
                ['label' => 'Tes 1', 'value' => 'Tes 1'],
                ['label' => 'Tes 2', 'value' => 'Tes 2'],
                ['label' => 'Tes 3', 'value' => 'Tes 3'],
                ['label' => 'Ulangan', 'value' => 'Ulangan']
            ]
        ],
        [
            'label' => 'Hasil Tes',
            'key' => 'value',
            'type' => Survey::TYPE_SELECT,
            'component_name' => null,
            'default_value' => null,
            'attribute' => null,
            'rule' => null,
            'options' => [
                ['label' => 'Reaktif', 'value' => 'Reaktif'],
                ['label' => 'Non Reaktif', 'value' => 'Non Reaktif'],
                ['label' => 'Invalid', 'value' => 'Invalid'],
                ['label' => 'Perlu Ulang', 'value' => 'Perlu Ulang']
            ]
        ],
        [
            'label' => 'Nama Reagen',
            'key' => 'value',
            'type' => Survey::TYPE_INPUT, // bebas diisi
            'component_name' => null,
            'default_value' => null,
            'attribute' => null,
            'rule' => null,
            'options' => null
        ],
    ]
];
