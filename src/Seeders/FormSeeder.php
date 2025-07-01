<?php

namespace Hanafalah\ModuleExamination\Seeders;

use Hanafalah\ModuleExamination\Models\Form\Form;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class FormSeeder extends Seeder{
    private $__form;

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->__form = app(config('database.models.Form', Form::class));

        $forms = [
            $this->modelMorph('Triage') => [
                'name' => 'Triage',
            ],
            $this->modelMorph('GCS') => [
                'name' => 'Glasgow Coma Scale',
            ],
            $this->modelMorph('Allergy') => [
                'name' => 'Riwayat Alergi Pasien'
            ],
            $this->modelMorph('VitalSign') => [
                'name' => 'Tanda Tanda Vital'
            ],
            $this->modelMorph('Symptom') => [
                'name' => 'Gejala & Keluhan'
            ],
            $this->modelMorph('PainScale') => [
                'name' => 'Sekala Nyeri'
            ],
            $this->modelMorph('Alloanamnese') => [
                'name' => 'Alloanamnese'
            ],
            $this->modelMorph('InitialDiagnose') => [
               'name'  => 'Diagnosa Awal/Masuk'
            ],
            $this->modelMorph('PrimaryDiagnose') => [
                'name'  => 'Diagnosa Primer'
            ],
            $this->modelMorph('SecondaryDiagnose') => [
                'name'  => 'Diagnosa Sekunder'
            ],
            $this->modelMorph('HistoryIllness') => [
                'name' => 'Riwayat Penyakit Patient'
            ],
            $this->modelMorph('FamilyIllness') => [
                'name' => 'Riwayat Penyakit Keluarga Patient'
            ],
            $this->modelMorph('PhysicalExamination') => [
                'name' => 'Pemeriksaan Fisik'
            ],
            $this->modelMorph('FoodHandlerExamination') => [
                'name' => 'Pemeriksaan Food Handler'
            ],
            $this->modelMorph('Odontogram') => [
                'name' => 'Odontogram'
            ],
            $this->modelMorph('EyeExamination') => [
                "name" => "Pemeriksaan Mata Lengkap"
            ],
            $this->modelMorph('EyeRefractionExamination') => [
                "name" => "Refraksi Mata"
            ],
            $this->modelMorph('EyeVisionColor') => [
                "name" => "Pemeriksaan matan dan Color Vision"
            ],
            $this->modelMorph('Anthropometry') => [
                'name' => 'Anthropometry'
            ],
            $this->modelMorph('EarExamination') => [
                'name' => 'Pemeriksaan Telinga'
            ],
            $this->modelMorph('LarynxExamination') => [
                'name' => 'Pemeriksaan Laring'
            ],
            $this->modelMorph('NoseExamination') => [
                'name' => 'Pemeriksaan Hidung'
            ],
            $this->modelMorph('ThroatExamination') => [
                'name' => 'Pemeriksaan Tenggorokan'
            ],
            $this->modelMorph('MCUMedicalHistory') => [
                'name' => 'Riwayat Penyakit Medis MCU'
            ],
            $this->modelMorph('MCUExamSummary') => [
                'name' => 'Summary Pemeriksaan MCU'
            ],
            $this->modelMorph('MCUPresentMedicalHistory') => [
                'name' => 'Kondisi Pasien MCU'
            ],
            $this->modelMorph('MCUPackageSummary') => [
                'name' => 'Hasil Akhir MCU'
            ],
            $this->modelMorph('SOAP') => [
                'name' => 'SOAP'
            ],
            $this->modelMorph('Vaccine') => [
                'name' => 'Riwayat Vaksinasi'
            ],
            $this->modelMorph('ADL') => [
                'name'    => 'Active of Daily Living (ADL)',
                'surveys' => [
                    include(__DIR__ . '/data/forms/ADL.php')
                ]
            ],
            $this->modelMorph('MNA') => [
                'name'    => 'Pengkajian Nutrisi (short form MNA)',
                'surveys' => [
                    include(__DIR__ . '/data/forms/MNA.php')
                ]
            ],
            $this->modelMorph('SPPB') => [
                'name'    => 'SHORT PHYSICAL PERFORMANCE BATTERY (SPPB)',
                'surveys' => [
                    include(__DIR__ . '/data/forms/SPPB.php')
                ]
            ],
            $this->modelMorph('ISKJ') => [
                'name'    => 'INSTRUMENT SKRINING KESEHATAN JIWA (ISKJ)',
                'surveys' => [
                    include(__DIR__ . '/data/forms/ISKJ.php')
                ]
            ],
            $this->modelMorph('PUMA') => [
                'name'    => 'INSTRUMENT SKRINING KESEHATAN JIWA (PUMA)',
                'surveys' => [
                    include(__DIR__ . '/data/forms/PUMA.php')
                ]
            ],
            $this->modelMorph('NewBornCheckUp') => [
                'name'    => 'PEMERIKSAAN BAYI BARU LAHIR',
                'surveys' => [
                    include(__DIR__ . '/data/forms/NewBornCheckUp.php')
                ]
            ],
            $this->modelMorph('MouthCavity') => [
                'name'    => 'KEADAAN RONGGA MULUT',
                'surveys' => [
                    include(__DIR__ . '/data/forms/MouthCavity.php')
                ]
            ],
            $this->modelMorph('MouthCavity') => [
                'name'    => 'KEADAAN RONGGA MULUT',
                'surveys' => [
                    include(__DIR__ . '/data/forms/MouthCavity.php')
                ]
            ],
            $this->modelMorph('MouthCavityOther') => [
                'name'    => 'KEADAAN GUSI, KEBERSIHAN GIGI,DAN KONDISI LAINNYA',
                'surveys' => [
                    include(__DIR__ . '/data/forms/MouthCavityOther.php')
                ]
            ],
            $this->modelMorph('HearingFunction') => [
                'name'    => 'PEMERIKSAAN FUNGSI PENDENGARAN',
                'surveys' => [
                    include(__DIR__ . '/data/forms/HearingFunction.php')
                ]
            ],
            $this->modelMorph('Malaria') => [
                'name'    => 'PEMERIKSAAN MALARIA',
                'surveys' => [
                    include(__DIR__ . '/data/forms/Malaria.php')
                ]
            ],
            $this->modelMorph('WastExamination') => [
                'name'    => 'PEMERIKSAAN KEKERASAN TERHADAP PEREMPUAN & ANAK',
                'surveys' => [
                    include(__DIR__ . '/data/forms/WastExamination.php')
                ]
            ],
            // $this->modelMorph('WastTypeExamination') => [
            //     'name'    => 'JENIS KEKERASAN TERHADAP PEREMPUAN',
            //     'surveys' => [
            //         include(__DIR__ . '/data/forms/WastTypeExamination.php')
            //     ]
            // ],
            $this->modelMorph('ANCTerpadu') => [
                'name'    => 'ANC TERPADU',
                'surveys' => [
                    include(__DIR__ . '/data/forms/ANCTerpadu.php')
                ]
            ],
            $this->modelMorph('TBContactHistory') => [
                'name'    => 'PEMERIKSAAN RIWAYAT KONTAK TBC',
                'surveys' => [
                    include(__DIR__ . '/data/forms/TBContactHistory.php')
                ]
            ],
            $this->modelMorph('TBRiskFactor') => [
                'name'    => 'FAKTOR RISIKO TBC',
                'surveys' => [
                    include(__DIR__ . '/data/forms/TBRiskFactor.php')
                ]
            ],
            $this->modelMorph('ThoraxExamination') => [
                'name'    => 'PEMERIKSAAN FOTO THORAX',
                'surveys' => [
                    include(__DIR__ . '/data/forms/ThoraxExamination.php')
                ]
            ],
            $this->modelMorph('HIV') => [
                'name'    => 'KAJIAN TINGKAT RISIKO HIV',
                'surveys' => [
                    include(__DIR__ . '/data/forms/HIV.php')
                ]
            ],
            $this->modelMorph('PostpartumObservation') => [
                'name'    => 'PELAYANAN KESEHATAN IBU NIFAS',
                'surveys' => [
                    include(__DIR__ . '/data/forms/PostpartumObservation.php')
                ]
            ],

            $this->modelMorph('AMT') => [
                'name'    => 'Abbreviated Mental Test (AMT)',
                'surveys' => [
                    include(__DIR__ . '/data/forms/AMT.php')
                ]
            ],
            $this->modelMorph('GDS4') => [
                'name'    => 'Geriatric Depression Scale (GDS4)',
                'surveys' => [
                    include(__DIR__ . '/data/forms/GDS4.php')
                ]
            ],
        ];
        $this->createForm($forms);

    }

    private function model(string $model): Model{
        return app(config('database.models.'.$model));
    }

    private function modelMorph(string $model): string{
        try {
            return $this->model($model)->getMorphClass();
        } catch (\Throwable $th) {
            dd($model);
        }
    }

    private function createForm($forms,$parent_id=null){
        foreach ($forms as $morph => $form) {
            $form_model = $this->__form->updateOrCreate([
                'parent_id' => $parent_id,
                'morph'     => $morph,
                'name'      => $form['name']
            ]);

            if (isset($form['prop']) && count($form['prop']) > 0){
                foreach ($form['prop'] as $prop_key => $prop) $form_model->{$prop_key} = $prop;
                $form_model->save();
            }

            if (isset($form['childs']) && count($form['childs']) > 0){
                $this->createForm($form['childs'],$form_model->getKey());
            }

            if (isset($surveys)){
                $surveys = $form['surveys'] ?? [];
                if (!is_array($surveys)) $surveys = [$surveys];

                $attaches = [];
                foreach ($surveys as $survey) {
                    $survey_model = $this->model('MasterSurvey')->updateOrCreate([
                        'flag' => $survey['flag']
                    ],[
                        'name' => $survey['name']
                    ]);

                    if (isset($survey['props'])){
                        $dynamic_forms = [];
                        foreach ($survey['props']['dynamic_forms'] as $key => $dynamic_form){
                            $dynamic_form['ordering'] = $key + 1;
                            $dynamic_forms[] = $dynamic_form;
                        }
                        $survey_model->setAttribute('dynamic_forms', $dynamic_forms);
                        $survey_model->save();
                    }
                    $attaches[] = $survey_model;
                }
                $form_model->surveys()->sync($attaches);
            }
        }
    }
}
