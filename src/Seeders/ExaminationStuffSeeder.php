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
                    'label' => 'EYE RESPONSE', 
                    'childs' => [
                        ['label' => 'EYE RESPONSE', 'name' => 'Tidak ada response', 'ordering' => 1, 'score' => 1],
                        ['label' => 'EYE RESPONSE', 'name' => 'Reaksi Terhadap Nyeri', 'ordering' => 2, 'score' => 2],
                        ['label' => 'EYE RESPONSE', 'name' => 'Reaksi Terhadap Suara', 'ordering' => 3, 'score' => 3],
                        ['label' => 'EYE RESPONSE', 'name' => 'Spontan', 'ordering' => 4, 'score' => 4]
                    ]
                ],[
                    'name'  => 'Response Verbal', 
                    'label' => 'VERBAL RESPONSE', 
                    'childs' => [
                        ['label' => 'VERBAL RESPONSE', 'name' => 'Tidak ada response', 'ordering' => 1, 'score' => 1],
                        ['label' => 'VERBAL RESPONSE', 'name' => 'Suara tidak jelas', 'ordering' => 2, 'score' => 2],
                        ['label' => 'VERBAL RESPONSE', 'name' => 'Kata-kata tidak teratur', 'ordering' => 3, 'score' => 3],
                        ['label' => 'VERBAL RESPONSE', 'name' => 'Bicara kacau /bingung', 'ordering' => 4, 'score' => 4],
                        ['label' => 'VERBAL RESPONSE', 'name' => 'Orientasi Baik', 'ordering' => 5, 'score' => 5]
                    ]
                ],[
                    'name'  => 'Response Motorik',
                    'label' => 'MOTORIK RESPONSE',
                    'childs' => [
                        ['label' => 'MOTORIK RESPONSE', 'name' => 'Tidak ada response', 'ordering' => 1, 'score' => 1],
                        ['label' => 'MOTORIK RESPONSE', 'name' => 'Esktensi', 'ordering' => 2, 'score' => 2],
                        ['label' => 'MOTORIK RESPONSE', 'name' => 'Fleksi Abnormal', 'ordering' => 3, 'score' => 3],
                        ['label' => 'MOTORIK RESPONSE', 'name' => 'Fleksi Normal', 'ordering' => 4, 'score' => 4],
                        ['label' => 'MOTORIK RESPONSE', 'name' => 'Melokalisir Nyeri', 'ordering' => 5, 'score' => 5],
                        ['label' => 'MOTORIK RESPONSE', 'name' => 'Ikut Perintah', 'ordering' => 6, 'score' => 6]
                    ]
                ]
            ],
            'AllergyStuff' => [
                [
                    'name'  => 'Jenis Alergy',
                    'label' => 'ALLERGY TYPE',
                    'childs' => [
                        ['label' => 'FOOD', 'name' => 'Food Marine', 'ordering' => 1],
                        ['label' => 'FOOD', 'name' => 'Food Poultry', 'ordering' => 2],
                        ['label' => 'FOOD', 'name' => 'Egg', 'ordering' => 3],
                        ['label' => 'FOOD', 'name' => 'Milk', 'ordering' => 4],
                        ['label' => 'FOOD', 'name' => 'Gluten', 'ordering' => 5],
                        ['label' => 'FOOD', 'name' => 'Nut', 'ordering' => 6],
                        ['label' => 'FOOD', 'name' => 'Fruit', 'ordering' => 7],
                        ['label' => 'FOOD', 'name' => 'Vegetable', 'ordering' => 8],
                        ['label' => 'ENVIRONMENTAL', 'name' => 'Dust', 'ordering' => 9],
                        ['label' => 'ENVIRONMENTAL', 'name' => 'Temperature', 'ordering' => 10],
                        ['label' => 'MEDICATION', 'name' => 'Drug', 'ordering' => 11],
                        ['label' => 'MEDICATION', 'name' => 'Antibiotik', 'ordering' => 12],
                        ['label' => 'MEDICATION', 'name' => 'Antikoagulan', 'ordering' => 13],
                        ['label' => 'MEDICATION', 'name' => 'Antidepresan', 'ordering' => 14],
                        ['label' => 'MEDICATION', 'name' => 'Antipsikotik', 'ordering' => 15],
                        ['label' => 'MEDICATION', 'name' => 'Anestesi', 'ordering' => 16],
                        ['label' => 'OTHER', 'name' => 'Others', 'ordering' => 1]
                    ]
                ]
            ],
            'VitalSignStuff' => [
                [
                    'name'  => 'Tingkat Kesadaran',
                    'label' => 'LOC',
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
                ['label' => 'NON EMERGENCY', 'name' => '≤ 2 jam', 'ordering' => 1, 'result' => 'Tidak Gawat Darurat'],
                ['label' => 'EMERGENCY', 'name' => '≤ 30 menit', 'ordering' => 2, 'result' => 'Darurat'],
                ['label' => 'CRITICAL EMERGENCY', 'name' => '≤ 5 menit', 'ordering' => 3, 'result' => 'Gawat Darurat'],
                ['label' => 'DECEASED', 'name' => '∞/≤ 5 menit', 'ordering' => 4, 'result' => 'Meninggal'],
            ],
            'ServiceLabel' => [
                [
                    'label' => 'AUDIOMETRI',
                    'name' => 'Audiometry'
                ],
                [
                    'label' => 'VAKSINASI',
                    'name' => 'Vaccine'
                ],
                [
                    'label' => 'ECG',
                    'name' => 'ECG'
                ],
                [
                    'label' => 'INJEKSI',
                    'name' => 'Injection'
                ],
                [
                    'label' => 'PCR',
                    'name' => 'PCR'
                ],
                [
                    'label' => 'SWAB TEST',
                    'name' => 'Tes Swab',
                ],
                [
                    'label' => 'PREGNANCY TEST',
                    'name' => 'Tes Kehamilan'
                ],
                [
                    'label' => 'HIV TEST',
                    'name' => 'Tes HIV'
                ],
                [
                    'label' => 'GLUCOSE TEST',
                    'name' => 'Tes Glukosa'
                ],
                [
                    'label' => 'MANTOUX TEST',
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
