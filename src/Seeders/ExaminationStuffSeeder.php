<?php

namespace Hanafalah\ModuleExamination\Seeders;

use Hanafalah\LaravelSupport\Concerns\Support\HasRequestData;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ExaminationStuffSeeder extends Seeder
{
    use HasRequestData;

    protected $__stuffs = [
            'GcsStuff' => [
                [
                    'name'  => 'Response Mata', 
                    'label' => 'Eye Response', 
                    'childs' => [
                        ['label' => 'Eye Response', 'name' => 'Tidak ada response', 'ordering' => 1, 'score' => 1],
                        ['label' => 'Eye Response', 'name' => 'Reaksi Terhadap Nyeri', 'ordering' => 2, 'score' => 2],
                        ['label' => 'Eye Response', 'name' => 'Reaksi Terhadap Suara', 'ordering' => 3, 'score' => 3],
                        ['label' => 'Eye Response', 'name' => 'Spontan', 'ordering' => 4, 'score' => 4]
                    ]
                ],[
                    'name'  => 'Response Verbal', 
                    'label' => 'Verbal Response', 
                    'childs' => [
                        ['label' => 'Verbal Response', 'name' => 'Tidak ada response', 'ordering' => 1, 'score' => 1],
                        ['label' => 'Verbal Response', 'name' => 'Suara tidak jelas', 'ordering' => 2, 'score' => 2],
                        ['label' => 'Verbal Response', 'name' => 'Kata-kata tidak teratur', 'ordering' => 3, 'score' => 3],
                        ['label' => 'Verbal Response', 'name' => 'Bicara kacau /bingung', 'ordering' => 4, 'score' => 4],
                        ['label' => 'Verbal Response', 'name' => 'Orientasi Baik', 'ordering' => 5, 'score' => 5]
                    ]
                ],[
                    'name'  => 'Response Motorik',
                    'label' => 'Motorik Response',
                    'childs' => [
                        ['label' => 'Motorik Response', 'name' => 'Tidak ada response', 'ordering' => 1, 'score' => 1],
                        ['label' => 'Motorik Response', 'name' => 'Esktensi', 'ordering' => 2, 'score' => 2],
                        ['label' => 'Motorik Response', 'name' => 'Fleksi Abnormal', 'ordering' => 3, 'score' => 3],
                        ['label' => 'Motorik Response', 'name' => 'Fleksi Normal', 'ordering' => 4, 'score' => 4],
                        ['label' => 'Motorik Response', 'name' => 'Melokalisir Nyeri', 'ordering' => 5, 'score' => 5],
                        ['label' => 'Motorik Response', 'name' => 'Ikut Perintah', 'ordering' => 6, 'score' => 6]
                    ]
                ]
            ],
            'AllergyStuff' => [
                [
                    'name'  => 'Jenis Alergy',
                    'label' => 'Allergy Type',
                    'childs' => [
                        ['label' => 'Food', 'name' => 'Food Marine', 'ordering' => 1],
                        ['label' => 'Food', 'name' => 'Food Poultry', 'ordering' => 2],
                        ['label' => 'Food', 'name' => 'Egg', 'ordering' => 3],
                        ['label' => 'Food', 'name' => 'Milk', 'ordering' => 4],
                        ['label' => 'Food', 'name' => 'Gluten', 'ordering' => 5],
                        ['label' => 'Food', 'name' => 'Nut', 'ordering' => 6],
                        ['label' => 'Food', 'name' => 'Fruit', 'ordering' => 7],
                        ['label' => 'Food', 'name' => 'Vegetable', 'ordering' => 8],
                        ['label' => 'Environmental', 'name' => 'Dust', 'ordering' => 9],
                        ['label' => 'Environmental', 'name' => 'Temperature', 'ordering' => 10],
                        ['label' => 'Medication', 'name' => 'Drug', 'ordering' => 11],
                        ['label' => 'Medication', 'name' => 'Antibiotik', 'ordering' => 12],
                        ['label' => 'Medication', 'name' => 'Antikoagulan', 'ordering' => 13],
                        ['label' => 'Medication', 'name' => 'Antidepresan', 'ordering' => 14],
                        ['label' => 'Medication', 'name' => 'Antipsikotik', 'ordering' => 15],
                        ['label' => 'Medication', 'name' => 'Anestesi', 'ordering' => 16],
                        ['label' => 'Other', 'name' => 'Others', 'ordering' => 1]
                    ]
                ]
            ],
            'VitalSignStuff' => [
                [
                    'name'  => 'Tingkat Kesadaran',
                    'label' => 'loc',
                    'childs' => [
                        ['label' => 'COMPOS MENTIS', 'name' => 'Compos Mentis', 'ordering' => 1, 'description' => 'Pasien sadar sepenuhnya, tidak ada gangguan kesadaran'],
                        ['label' => 'APATIS', 'name' => 'Apatis', 'ordering' => 2, 'description' => 'Pasien sadar, tetapi tidak memiliki minat atau motivasi melakukan apapun'],
                        ['label' => 'DELIRIUM', 'name' => 'Delirium', 'ordering' => 3, 'description' => 'Pasien sadar, tetapi memiliki gangguan kesadaran yang akut dan fluktuatif'],
                        ['label' => 'SOMNOLENCE', 'name' => 'Somnolence', 'ordering' => 4, 'description' => 'Pasien sadara, tetapi sulit untuk dibangungkan, terlihat lesu dan tidak responsif, dapat dibangunkan dengan rangsangan yang kuat'],
                        ['label' => 'SOPOR', 'name' => 'Sopor', 'ordering' => 5, 'description' => 'Pasien sadar, tetapi sulit untuk dibangungkan, terlihat lesu dan tidak responsif, tidak dapat dibangunkan dengan rangsangan yang kuat'],
                        ['label' => 'SEMI COMA', 'name' => 'Sopor', 'ordering' => 6, 'description' => 'Pasien sadar, tetapi sulit untuk dibangungkan, terlihat lesu dan tidak responsif, tidak dapat dibangunkan dengan rangsangan yang kuat, tetapi masih memiliki refleks makan'],
                        ['label' => 'COMA', 'name' => 'Sopor', 'ordering' => 7, 'description' => 'Pasien tidak sadar, tidak memiliki respon terhadap rangsangan apapun']
                    ]
                ]
            ],
            'TriageStuff' => [
                ['label' => 'Non Emergency', 'name' => '≤ 2 jam', 'ordering' => 1, 'result' => 'Tidak Gawat Darurat'],
                ['label' => 'Emergency', 'name' => '≤ 30 menit', 'ordering' => 2, 'result' => 'Darurat'],
                ['label' => 'Critical Emergency', 'name' => '≤ 5 menit', 'ordering' => 3, 'result' => 'Gawat Darurat'],
                ['label' => 'Deceased', 'name' => '∞/≤ 5 menit', 'ordering' => 4, 'result' => 'Meninggal'],
            ],
            'ServiceLabel' => [
                [
                    'label' => 'Audiometri',
                    'name' => 'Audiometry'
                ],
                [
                    'label' => 'Vaksinasi',
                    'name' => 'Vaccine'
                ],
                [
                    'label' => 'ECG',
                    'name' => 'ECG'
                ],
                [
                    'label' => 'Injeksi',
                    'name' => 'Injection'
                ],
                [
                    'label' => 'PCR',
                    'name' => 'PCR'
                ],
                [
                    'label' => 'Swab Test',
                    'name' => 'Tes Swab',
                ],
                [
                    'label' => 'Pregnancy Test',
                    'name' => 'Tes Kehamilan'
                ],
                [
                    'label' => 'HIV Test',
                    'name' => 'Tes HIV'
                ],
                [
                    'label' => 'Glucose Test',
                    'name' => 'Tes Glukosa'
                ],
                [
                    'label' => 'Mantoux Test',
                    'name' => 'Tes Mantoux'
                ]
            ]
        ];
    
    public function run(){
        foreach ($this->__stuffs as $key => $stuff) {
            foreach ($stuff as $value) {
                $value['flag'] = $key;
                $this->schema($key)->{'prepareStore'.$key}($this->requestDTO(config('app.contracts.'.$key.'Data'), $value));
            }
        }
    }

    private function schema(string $contract){
        $contract = Str::studly($contract);
        return app(config('app.contracts.'.$contract));
    }
}
