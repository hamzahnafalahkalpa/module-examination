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
            ],
            'LaborTypeStuff' => [
                [
                    'name'  => 'Jenis Persalinan',
                    'label' => 'LABOR TYPE',
                    'childs' => [
                        ['label' => 'Spontaneous Vaginal Delivery','name' => 'Persalinan Normal / Spontan (Spontaneous Vaginal Delivery)'],
                        ['label' => 'Induced Labor','name' => 'Persalinan dengan Induksi (Induced Labor)'],
                        ['label' => 'Vacuum Extraction','name' => 'Persalinan Vakum (Vacuum Extraction)'],
                        ['label' => 'Forceps Delivery','name' => 'Persalinan Forsep (Forceps Delivery)'],
                        ['label' => 'Cesarean Section','name' => 'Operasi Sesar (Cesarean Section)'],
                        ['label' => 'VBAC','name' => 'Persalinan Normal setelah Sesar (VBAC)'],
                        ['label' => 'Preterm Birth','name' => 'Persalinan Prematur (Preterm Birth)'],
                        ['label' => 'Post-term Birth','name' => 'Persalinan Lewat Waktu (Post-term Birth)'],
                        ['label' => 'Water Birth','name' => 'Persalinan di Air (Water Birth)'],
                        ['label' => 'Home Birth','name' => 'Persalinan di Rumah (Home Birth)'],
                        ['label' => 'Lotus Birth','name' => 'Lotus Birth (Lotus Birth)'],
                        ['label' => 'Gentle Birth / Hypnobirthing','name' => 'Gentle Birth / Hipnobirthing (Gentle Birth / Hypnobirthing)'],
                    ]
                ]
            ],
            'BirthHelperStuff' => [
                [
                    'name'  => 'Jenis Penolong',
                    'label' => 'BIRTH HELPER',
                    'childs' => [
                        ['label' => 'Keluarga', 'name' => 'Keluarga'],
                        ['label' => 'Dukun', 'name' => 'Dukun'],
                        ['label' => 'Bidan', 'name' => 'Bidan'],
                        ['label' => 'Dokter Umum', 'name' => 'Dokter Umum'],
                        ['label' => 'Dokter Spesialis', 'name' => 'Dokter Spesialis'],
                        ['label' => 'Tenaga Medis Lainnya', 'name' => 'Tenaga Medis Lainnya'],
                        ['label' => 'Tidak Ada', 'name' => 'Tidak Ada']
                    ]
                ]
            ],
            'ContraceptionStuff' => [
                [
                    'name'  => 'Jenis Kontrasepsi',
                    'label' => 'JENIS KONTRASEPSI',
                    'childs' => [
                        ['label' => 'Implant', 'name' => 'Implant'],
                        ['label' => 'IUD', 'name' => 'IUD'],
                        ['label' => 'Kondom', 'name' => 'Kondom'],
                        ['label' => 'MOP', 'name' => 'MOP'],
                        ['label' => 'MOW', 'name' => 'MOW'],
                        ['label' => 'Pil Kombinasi', 'name' => 'Pil Kombinasi'],
                        ['label' => 'Pil Laktasi', 'name' => 'Pil Laktasi'],
                        ['label' => 'Suntikan 1 Bulan', 'name' => 'Suntikan 1 Bulan'],
                        ['label' => 'Suntikan 3 Bulan', 'name' => 'Suntikan 3 Bulan']
                    ]
                ]
            ],
            'ImmunizationStuff' => [
                [
                    'name'  => 'Imunisasi',
                    'label' => 'IMMUNIZATION',
                    'childs' => [
                        [
                            'name' => 'Hepatitis',
                            'label' => 'Hepatitis- Group',
                            'childs' => [
                                ['name' => 'Hepatitis B', 'label' => 'Hepatitis B'],
                                ['name' => 'Hepatitis B - I', 'label' => 'Hepatitis B - I'],
                                ['name' => 'Hepatitis B - II', 'label' => 'Hepatitis B - II'],
                                ['name' => 'Hepatitis B - III', 'label' => 'Hepatitis B - III'],
                                ['name' => 'Hepatitis B - IV', 'label' => 'Hepatitis B - IV'],
                                ['name' => 'Hepatitis A', 'label' => 'Hepatitis A'],
                                ['name' => 'Hepatitis A - I', 'label' => 'Hepatitis A - I'],
                            ]
                        ],
                        [
                            'name' => 'DPT',
                            'label' => 'DPT - Group',
                            'childs' => [
                                ['name' => 'DPT', 'label' => 'DPT'],
                                ['name' => 'DPT - I', 'label' => 'DPT - I'],
                                ['name' => 'DPT - II', 'label' => 'DPT - II'],
                                ['name' => 'DPT - III', 'label' => 'DPT - III'],
                                ['name' => 'DPT - IV', 'label' => 'DPT - IV'],
                            ]
                        ],
                        [
                            'name' => 'Polio',
                            'label' => 'Polio - Group',
                            'childs' => [
                                ['name' => 'Polio', 'label' => 'Polio'],
                                ['name' => 'Polio - I', 'label' => 'Polio - I'],
                                ['name' => 'Polio - II', 'label' => 'Polio - II'],
                                ['name' => 'Polio - III', 'label' => 'Polio - III'],
                                ['name' => 'Polio - IV', 'label' => 'Polio - IV'],
                                ['name' => 'IPV - II', 'label' => 'IPV - II'],
                            ]
                        ],
                        [
                            'name' => 'HiB',
                            'label' => 'HiB - Group',
                            'childs' => [
                                ['name' => 'HiB', 'label' => 'HiB'],
                                ['name' => 'HiB - I', 'label' => 'HiB - I'],
                                ['name' => 'HiB - II', 'label' => 'HiB - II'],
                                ['name' => 'HiB - III', 'label' => 'HiB - III'],
                                ['name' => 'HiB - IV', 'label' => 'HiB - IV'],
                            ]
                        ],
                        [
                            'name' => 'PCV',
                            'label' => 'PCV - Group',
                            'childs' => [
                                ['name' => 'PCV', 'label' => 'PCV'],
                                ['name' => 'PCV - I', 'label' => 'PCV - I'],
                                ['name' => 'PCV - II', 'label' => 'PCV - II'],
                                ['name' => 'PCV - III', 'label' => 'PCV - III'],
                            ]
                        ],
                        [
                            'name' => 'Rotavirus',
                            'label' => 'Rotavirus - Group',
                            'childs' => [
                                ['name' => 'Rotavirus', 'label' => 'Rotavirus'],
                                ['name' => 'Rotavirus - I', 'label' => 'Rotavirus - I'],
                                ['name' => 'Rotavirus - II', 'label' => 'Rotavirus - II'],
                                ['name' => 'Rotavirus - III', 'label' => 'Rotavirus - III'],
                            ]
                        ],
                        [
                            'name' => 'TD',
                            'label' => 'TD - Group',
                            'childs' => [
                                ['name' => 'TD', 'label' => 'TD'],
                                ['name' => 'TD - I', 'label' => 'TD - I'],
                                ['name' => 'TD - II', 'label' => 'TD - II'],
                                ['name' => 'TD - III', 'label' => 'TD - III'],
                            ]
                        ],
                        [
                            'name' => 'DT',
                            'label' => 'DT - Group',
                            'childs' => [
                                ['name' => 'DT', 'label' => 'DT'],
                                ['name' => 'DT - I', 'label' => 'DT - I'],
                            ]
                        ],
                        [
                            'name' => 'HPV',
                            'label' => 'HPV - Group',
                            'childs' => [
                                ['name' => 'HPV', 'label' => 'HPV'],
                                ['name' => 'HPV - I', 'label' => 'HPV - I'],
                                ['name' => 'HPV - II', 'label' => 'HPV - II'],
                            ]
                        ],
                        [
                            'name' => 'MR/MMR',
                            'label' => 'MR/MMR - Group',
                            'childs' => [
                                ['name' => 'MR/MMR', 'label' => 'MR/MMR'],
                                ['name' => 'MR/MMR - I', 'label' => 'MR/MMR - I'],
                                ['name' => 'MR/MMR - II', 'label' => 'MR/MMR - II'],
                            ]
                        ],
                        [
                            'name' => 'Dengue',
                            'label' => 'Dengue - Group',
                            'childs' => [
                                ['name' => 'Dengue', 'label' => 'Dengue'],
                                ['name' => 'Dengue - I', 'label' => 'Dengue - I'],
                                ['name' => 'Dengue - II', 'label' => 'Dengue - II'],
                                ['name' => 'Dengue - III', 'label' => 'Dengue - III'],
                            ]
                        ],
                        [
                            'name' => 'BCG',
                            'label' => 'BCG - Group',
                            'childs' => [
                                ['name' => 'BCG', 'label' => 'BCG'],
                                ['name' => 'BCG - I', 'label' => 'BCG - I'],
                            ]
                        ],
                        [
                            'name' => 'Varisela',
                            'label' => 'Varisela - Group',
                            'childs' => [
                                ['name' => 'Varisela', 'label' => 'Varisela'],
                                ['name' => 'Varisela - I', 'label' => 'Varisela - I'],
                            ]
                        ],
                        [
                            'name' => 'Japanese Encephalitis',
                            'label' => 'Japanese Encephalitis - Group',
                            'childs' => [
                                ['name' => 'Japanese Encephalitis', 'label' => 'Japanese Encephalitis'],
                                ['name' => 'Japanese Encephalitis - I', 'label' => 'Japanese Encephalitis - I'],
                            ]
                        ],
                    ]
                ]
            ],
            'SingleTestStuff' => [
                [
                    'name'  => 'Kategori Single Test',
                    'label' => 'KATEGORI SINGLE TEST ',
                    'childs' => [
                        ['label' => 'MALE 1000M 10-12', 'name' => 'Single test 1000m laki-laki usia 10-12 tahun'],
                        ['label' => 'FEMALE 1000M 10-12', 'name' => 'Single test 1000m perempuan usia 10-12 tahun'],
                        ['label' => 'MALE 1600M 13-19', 'name' => 'Single test 1600m laki-laki usia 13-19 tahun'],
                        ['label' => 'FEMALE 1600M 13-19', 'name' => 'Single test 1600m perempuan usia 13-19 tahun'],
                    ]
                ]
            ],
            'HearingLossStuff' => [
                [
                    'name' => 'Kategori Hearing Loss',
                    'label' => 'KATEGORI HEARING LOSS',
                    'childs' => [
                        ['label' => 'Gangguan Pendengaran', 'name' => 'Gangguan Pendengaran', 'childs' => [
                            ['label' => 'Otitis Media Supuratif Kronik', 'name' => 'Otitis Media Supuratif Kronik'],
                            ['label' => '(OMSK/Congek)', 'name' => '(OMSK/Congek)'],
                            ['label' => 'Sumbatan Serumen', 'name' => 'Sumbatan Serumen'],
                            ['label' => 'Presbikusis', 'name' => 'Presbikusis'],
                            ['label' => 'Tuli akibat Bising (NIHL)', 'name' => 'Tuli akibat Bising (NIHL)'],
                            ['label' => 'Curiga Tuli Kongenital', 'name' => 'Curiga Tuli Kongenital'],
                            ['label' => 'Tuli Akibat Obat Ototoksik', 'name' => 'Tuli Akibat Obat Ototoksik'],
                            ['label' => 'Lainnya', 'name' => 'Lain-lain'],
                        ]],
                    ]
                ]
            ]
        ];
    
    public function run(){
        echo "[DEBUG] Booting ".class_basename($this)."\n";
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
