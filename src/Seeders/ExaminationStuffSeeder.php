<?php

namespace Hanafalah\ModuleExamination\Seeders;

use Hanafalah\ModuleExamination\Models\ExaminationStuff;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ExaminationStuffSeeder extends Seeder
{
    private $__examination_stuff;

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->__examination_stuff = app(config('database.models.ExaminationStuff', ExaminationStuff::class));
        $stuffs = [
            $this->model('GCS') => [
                'eyes' => [
                    ['value' => 'Tidak ada response', 'prop'  => ['ordering' => 1, 'score' => 1]],
                    ['value' => 'Reaksi Terhadap Nyeri', 'prop'  => ['ordering' => 2, 'score' => 2]],
                    ['value' => 'Reaksi Terhadap Suara', 'prop'  => ['ordering' => 3, 'score' => 3]],
                    ['value' => 'Spontan', 'prop'  => ['ordering' => 4, 'score' => 4]]
                ],
                'verbal' => [
                    ['value' => 'Tidak Ada Respon', 'prop'  => ['ordering' => 1, 'score' => 1]],
                    ['value' => 'Suara tidak jelas', 'prop'  => ['ordering' => 2, 'score' => 2]],
                    ['value' => 'Kata-kata tidak teratur', 'prop'  => ['ordering' => 3, 'score' => 3]],
                    ['value' => 'Bicara kacau /bingung', 'prop'  => ['ordering' => 4, 'score' => 4]],
                    ['value' => 'Orientasi Baik', 'prop'  => ['ordering' => 5, 'score' => 5]]
                ],
                'motor' => [
                    ['value' => 'Tidak Ada Respon', 'prop' => ['ordering' => 1, 'score' => 1]],
                    ['value' => 'Esktensi', 'prop' => ['ordering' => 2, 'score' => 2]],
                    ['value' => 'Fleksi Abnormal', 'prop' => ['ordering' => 3, 'score' => 3]],
                    ['value' => 'Fleksi Normal', 'prop' => ['ordering' => 4, 'score' => 4]],
                    ['value' => 'Melokalisir Nyeri', 'prop' => ['ordering' => 5, 'score' => 5]],
                    ['value' => 'Ikut Perintah', 'prop' => ['ordering' => 6, 'score' => 6]]
                ]
            ],
            $this->model('Allergy') => [
                'type' => [
                    ['value' => 'MAKANAN LAUT'],
                    ['value' => 'MAKANAN BERBAHAN UNGGAS'],
                    ['value' => 'TELUR'],
                    ['value' => 'SUSU'],
                    ['value' => 'GLUTEN'],
                    ['value' => 'KACANG - KACANGAN'],
                    ['value' => 'BUAH - BUAHAN'],
                    ['value' => 'SAYURAN'],
                    ['value' => 'DEBU'],
                    ['value' => 'SUHU'],
                    ['value' => 'OBAT'],
                    ['value' => 'LAINNYA']
                ]
            ],
            $this->model('VitalSign') => [
                'loc' => [
                    [
                        'value' => 'COMPOS MENTIS',
                        'prop'  => [
                            "ordering" => 1,
                            'description' => 'Pasien sadar sepenuhnya, tidak ada gangguan kesadaran'
                        ]
                    ],
                    [
                        'value' => 'APATIS',
                        'prop' => [
                            "ordering" => 2,
                            'description' => 'Pasien sadar, tetapi tidak memiliki minat atau motivasi melakukan apapun'
                        ]
                    ],
                    [
                        'value' => 'DELIRIUM',
                        'prop' => [
                            "ordering" => 3,
                            'description' => 'Pasien sadar, tetapi memiliki gangguan kesadaran yang akut dan fluktuatif'
                        ]
                    ],
                    [
                        'value' => 'SOMNOLENCE',
                        'prop' => [
                            "ordering" => 4,
                            'description' => 'Pasien sadara, tetapi sulit untuk dibangungkan, terlihat lesu dan tidak responsif, dapat dibangunkan dengan rangsangan yang kuat'
                        ]
                    ],
                    [
                        'value' => 'SOPOR',
                        'prop' => [
                            "ordering" => 5,
                            'description' => 'Pasien tidak sadar, tetapi masih memiliki response motorik yang lemah, dapat bergerak sedikit, tidak dapat berbicara atau berinteraksi'
                        ]
                    ],
                    [
                        'value' => 'SEMI COMA',
                        'prop' => [
                            "ordering" => 6,
                            'description' => 'Pasien tidak sadar, tetapi masih memiliki beberapa response motorik, dapat bergerak lebih sedikit seperti mengedipkan mata, atau menunjukkan reaksi rangsangan, tidak dapat berbicara dan berinteraksi'
                        ]
                    ],
                    [
                        'value' => 'COMA',
                        'prop'  => [
                            "ordering" => 7,
                            'description' => 'Pasien tidak sadar, tidak ada respon motoik dan reaksi terhadap rangsangan, tidak dapat berbicara, bergerak dan berinteraksi'
                        ]
                    ]
                ]
            ],
            $this->model('Triage') => [
                [
                    "value"   => "≤ 2 jam",
                    "prop"    => [
                        "ordering" => 1,
                        "result" => "Tidak Gawat Darurat"
                    ]
                ],
                [
                    "value"   => "≤ 30 menit",
                    "prop" => [
                        "ordering" => 2,
                        "result" => "Darurat"
                    ]
                ],
                [
                    "value"   => "≤ 5 menit",
                    "prop" => [
                        "ordering" => 3,
                        "result" => "Gawat Darurat"
                    ]
                ],
                [
                    "value"   => "∞/≤ 5 menit",
                    "prop" => [
                        "ordering" => 4,
                        "result" => "Meninggal"
                    ]
                ]
            ],
            $this->model('FamilyIllness') => [
                'family_role_id' => [
                    ['value' => 'Adik Laki - Laki'],
                    ['value' => 'Adik Perempuan'],
                    ['value' => 'Anak'],
                    ['value' => 'Ayah'],
                    ['value' => 'Ibu'],
                    ['value' => 'Istri'],
                    ['value' => 'Kakak Laki - Laki'],
                    ['value' => 'Kakak Perempuan'],
                    ['value' => 'Kakek'],
                    ['value' => 'Nenek'],
                    ['value' => 'Saudara'],
                    ['value' => 'Sepupu'],
                    ['value' => 'Suami']
                ]
            ],
            $this->model('ServiceLabel') => [
                [
                    'value' => 'AUDIOMETRY',
                    "prop"    => [
                        "result" => "Pemeriksaan Tindakan Audiometry"
                    ]
                ],
                [
                    'value' => 'VACCINE',
                    "prop"    => [
                        "result" => "Vaksinasi"
                    ]
                ],
                [
                    'value' => 'ECG',
                    "prop"    => [
                        "result" => "Pemeriksaan Tindakan ECG"
                    ]
                ],
                [
                    'value' => 'INJECTION',
                    "prop"    => [
                        "result" => "Pemeriksaan Tindakan Injection"
                    ]
                ],
                [
                    'value' => 'PCR',
                    "prop"    => [
                        "result" => "Pemeriksaan Tindakan PCR"
                    ]
                ],
                [
                    'value' => 'SWAB_TEST',
                    "prop"    => [
                        "result" => "Pemeriksaan Tindakan Swab Test"
                    ]
                ],
                [
                    'value' => 'PREGNANCY_TEST',
                    "prop"    => [
                        "result" => "Pemeriksaan Tindakan Pregnancy Test"
                    ]
                ],
                [
                    'value' => 'HIV',
                    "prop"    => [
                        "result" => "Pemeriksaan Tindakan HIV"
                    ]
                ],
                [
                    'value' => 'GLUKOSA_TEST',
                    "prop"    => [
                        "result" => "Pemeriksaan Tindakan Glukosa Test"
                    ]
                ],
                [
                    'value' => 'MANTOUX_TEST',
                    "prop"    => [
                        "result" => "Pemeriksaan Tindakan Mantoux"
                    ]
                ]
            ]
        ];
        $this->createStuff($stuffs);
    }

    private function model(string $model): string
    {
        return app(config('database.models.' . $model))->getMorphClass();
    }

    private function createStuff($stuffs, $parent_id = null)
    {
        foreach ($stuffs as $key => $stuff) {
            foreach ($stuff as $type => $value) {
                if (!is_numeric($type)) {
                    $flag = Str::upper($key . '_' . $type);
                } else {
                    $flag = Str::upper($key);
                    $value = [$value];
                }
                foreach ($value as $val) {
                    $stuff_model = $this->__examination_stuff->updateOrCreate([
                        'parent_id' => $parent_id,
                        'flag' => $flag,
                        'name' => $val['value']
                    ]);

                    if (isset($val['prop']) && count($val['prop']) > 0) {
                        foreach ($val['prop'] as $prop_key => $prop) $stuff_model->{$prop_key} = $prop;
                        $stuff_model->save();
                    }
                    if (isset($val['childs']) && count($val['childs']) > 0) {
                        $this->createStuff($val['childs'], $stuff_model->getKey());
                    }
                }
            }
        }
    }
}
