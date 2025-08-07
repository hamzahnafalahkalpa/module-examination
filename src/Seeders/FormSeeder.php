<?php

namespace Hanafalah\ModuleExamination\Seeders;

use Hanafalah\LaravelSupport\Concerns\Support\HasRequestData;
use Hanafalah\ModuleExamination\Models\Form\Form;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class FormSeeder extends Seeder{
    use HasRequestData;

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
            $this->modelMorph('ADL') => [
                'name'    => 'Active of Daily Living (ADL)',
                'form_has_survey' => [
                    "survey" => include(__DIR__ . '/data/forms/ADL.php')
                ]
            ],
            $this->modelMorph('AdministrationVitaminA') => [
                'name'    => 'Pemberian Vitamin A'
            ],
            $this->modelMorph('Allergy') => [
                'name' => 'Riwayat Alergi Pasien'
            ],
            $this->modelMorph('Alloanamnese') => [
                'name' => 'Alloanamnese'
            ],
            $this->modelMorph('AMT') => [
                'name'    => 'Active of Daily Living (AMT)',
                'form_has_survey' => [
                    "survey" => include(__DIR__ . '/data/forms/AMT.php')
                ]
            ],
            $this->modelMorph('ANCTerpadu') => [
                'name'    => 'ANC TERPADU',
                'form_has_survey' => [
                    "survey" => include(__DIR__ . '/data/forms/ANCTerpadu.php')
                ]
            ],
            $this->modelMorph('Anthropometry') => [
                'name' => 'Anthropometry'
            ],
            $this->modelMorph('AudiometriTest') => [
                'name' => 'Tes Audiometri'
            ],
            $this->modelMorph('BloodSugarTest') => [
                'name' => 'Tes Gula Darah'
            ],
            $this->modelMorph('ChildAndPregnancyHistory') => [
                'name' => 'Anak dan Riwayat Persalinan'
            ],
            $this->modelMorph('ChildGrowth') => [
                'name' => 'Tumbuh Kembang Anak',
                'form_has_survey' => [
                    "survey" => include(__DIR__ . '/data/forms/ChildGrowth.php')
                ]
            ],
            $this->modelMorph('EarExamination') => [
                'name' => 'Pemeriksaan Telinga'
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
            $this->modelMorph('FamilyPlanningService') => [
                "name" => "Pelayanan KB"
            ],
            $this->modelMorph('Partus') => [
                "name" => "Persalinan",
                'form_has_survey' => [
                    "survey" => include(__DIR__ . '/data/forms/Partus.php')
                ]
            ],
            $this->modelMorph('FoodHandlerExamination') => [
                "name" => "Pemeriksaan Penyelenggara Makanan"    
            ],
            $this->modelMorph('GCS') => [
                'name' => 'Glasgow Coma Scale',
            ],
            $this->modelMorph('GDS4') => [
                'name'    => 'Geriatric Depression Scale (GDS4)',
                'form_has_survey' => [
                    "survey" => include(__DIR__ . '/data/forms/GDS4.php')
                ]
            ],
             $this->modelMorph('HIV') => [
                'name'    => 'KAJIAN TINGKAT RISIKO HIV',
                'form_has_survey' => [
                    "survey" => include(__DIR__ . '/data/forms/HIV.php')
                ]
            ],
            $this->modelMorph('HIVAntibodyTest') => [
                "name" => "Tes Antibodi HIV",
                'form_has_survey' => [
                    "survey" => include(__DIR__ . '/data/forms/HIVAntibodyTest.php')
                ]
            ],
            $this->modelMorph('HearingFunction') => [
                'name'    => 'PEMERIKSAAN FUNGSI PENDENGARAN',
                'form_has_survey' => [
                    "survey" => include(__DIR__ . '/data/forms/HearingFunction.php')
                ]
            ],
            $this->modelMorph('HearingLossHistory') => [
                'name' => 'Gangguan Pendengaran'
            ],
            $this->modelMorph('HemoglobinTest') => [
                "name" => "Pemeriksaan Hemoglobin (HB)"    
            ],
            $this->modelMorph('ISKJ') => [
                'name'    => 'INSTRUMENT SKRINING KESEHATAN JIWA (ISKJ)',
                'form_has_survey' => [
                    "survey" => include(__DIR__ . '/data/forms/ISKJ.php')
                ]
            ],
            $this->modelMorph('ImmunizationHistory') => [
                "name" => "Riwayat Imunisasi"    
            ],
            // $this->modelMorph('KalaIExamination') => [
            //     "name" => "Pemeriksaan Kala I"    
            // ],
            // $this->modelMorph('KalaIIExamination') => [
            //     "name" => "Pemeriksaan Kala II"    
            // ],
            // $this->modelMorph('KalaIIIExamination') => [
            //     "name" => "Pemeriksaan Kala III"    
            // ],
            // $this->modelMorph('KalaIVExamination') => [
            //     "name" => "Pemeriksaan Kala IV"    
            // ],
            $this->modelMorph('LarynxExamination') => [
                'name' => 'Pemeriksaan Laring'
            ],
            $this->modelMorph('MCUExamSummary') => [
                'name' => 'Summary Pemeriksaan MCU'
            ],
            $this->modelMorph('MCUMedicalHistory') => [
                'name' => 'Riwayat Penyakit Medis MCU'
            ],
            $this->modelMorph('MCUPackageSummary') => [
                'name' => 'Hasil Akhir MCU'
            ],
            $this->modelMorph('MCUPresentMedicalHistory') => [
                'name' => 'Kondisi Pasien MCU'
            ],
            $this->modelMorph('MNA') => [
                'name'    => 'Pengkajian Nutrisi (short form MNA)',
                'form_has_survey' => [
                    "survey" => include(__DIR__ . '/data/forms/MNA.php')
                ]
            ],
            $this->modelMorph('Malaria') => [
                'name'    => 'PEMERIKSAAN MALARIA',
                'form_has_survey' => [
                    "survey" => include(__DIR__ . '/data/forms/Malaria.php')
                ]
            ],
            $this->modelMorph('MorseFallScale') => [
                "name" => "Risiko Jatuh (Morse Fall Scale)",
                'form_has_survey' => [
                    "survey" => include(__DIR__ . '/data/forms/MorseFallScale.php')
                ]
            ],
            $this->modelMorph('MouthCavity') => [
                'name'    => 'KEADAAN RONGGA MULUT',
                'form_has_survey' => [
                    "survey" => include(__DIR__ . '/data/forms/MouthCavity.php')
                ]
            ],
            $this->modelMorph('MouthCavityOther') => [
                'name'    => 'KEADAAN GUSI, KEBERSIHAN GIGI,DAN KONDISI LAINNYA',
                'form_has_survey' => [
                    "survey" => include(__DIR__ . '/data/forms/MouthCavityOther.php')
                ]
            ],
            $this->modelMorph('NeonatalEsensial') => [
                "name" => "Neonatal Esential",
                'form_has_survey' => [
                    "survey" => include(__DIR__ . '/data/forms/NeonatalEsensial.php')
                ] 
            ],
            $this->modelMorph('NewBornCheckUp') => [
                'name'    => 'PEMERIKSAAN BAYI BARU LAHIR',
                'form_has_survey' => [
                    "survey" => include(__DIR__ . '/data/forms/NewBornCheckUp.php')
                ]
            ],
            $this->modelMorph('NoseExamination') => [
                'name' => 'Pemeriksaan Hidung'
            ],
            $this->modelMorph('Odontogram') => [
                'name' => 'Odontogram'
            ],
            $this->modelMorph('PARQ') => [
                "name" => "Physical Activity Readiness Questionnaire (PAR-Q)",
                'form_has_survey' => [
                    "survey" => include(__DIR__ . '/data/forms/PARQ.php')
                ]
            ],
            $this->modelMorph('POPMHistory') => [
                "name" => "Pemberian obat pencegahan massal cacingan (POPM)"    
            ],
            $this->modelMorph('PUMA') => [
                'name'    => 'INSTRUMENT SKRINING KESEHATAN JIWA (PUMA)',
                'form_has_survey' => [
                    "survey" => include(__DIR__ . '/data/forms/PUMA.php')
                ]
            ],
            $this->modelMorph('PainScale') => [
                'name' => 'Sekala Nyeri'
            ],
            $this->modelMorph('PhysicalActivity') => [
                "name" => "Aktifitas Harian",
                'form_has_survey' => [
                    "survey" => include(__DIR__ . '/data/forms/PhysicalActivity.php')
                ]
            ],
            $this->modelMorph('PostpartumObservation') => [
                'name'    => 'PELAYANAN KESEHATAN IBU NIFAS',
                'form_has_survey' => [
                    "survey" => include(__DIR__ . '/data/forms/PostpartumObservation.php')
                ]
            ],
            $this->modelMorph('RocportTest') => [
                "name" => "Rocport Test"    
            ],
            $this->modelMorph('SingleTest') => [
                "name" => "Single Test"    
            ],
            $this->modelMorph('SNST') => [
                "name" => "Formulir Gizi SNST",
                'form_has_survey' => [
                    "survey" => include(__DIR__ . '/data/forms/SNST.php')
                ]
            ],
            $this->modelMorph('SOAP') => [
                "name" => "SOAP"    
            ],
            $this->modelMorph('SPPB') => [
                'name'    => 'SHORT PHYSICAL PERFORMANCE BATTERY (SPPB)',
                'form_has_survey' => [
                    "survey" => include(__DIR__ . '/data/forms/SPPB.php')
                ]
            ],
            $this->modelMorph('Symptom') => [
                'name' => 'Gejala & Keluhan'
            ],
            $this->modelMorph('TBContactHistory') => [
                'name'    => 'PEMERIKSAAN RIWAYAT KONTAK TBC',
                'form_has_survey' => [
                    "survey" => include(__DIR__ . '/data/forms/TBContactHistory.php')
                ]
            ],
            $this->modelMorph('TBRiskFactor') => [
                'name'    => 'FAKTOR RISIKO TBC',
                'form_has_survey' => [
                    "survey" => include(__DIR__ . '/data/forms/TBRiskFactor.php')
                ]
            ],
            $this->modelMorph('TTDExamination') => [
                "name" => "Tablet Tambah Darah (TTD)"    
            ],
            $this->modelMorph('TetanusImmunization') => [
                "name" => "Riwayat Imunisasi Tetanus"    
            ],
            $this->modelMorph('ThoraxExamination') => [
                'name'    => 'PEMERIKSAAN FOTO THORAX',
                'form_has_survey' => [
                    "survey" => include(__DIR__ . '/data/forms/ThoraxExamination.php')
                ]
            ],
            $this->modelMorph('ThroatExamination') => [
                'name' => 'Pemeriksaan Tenggorokan'
            ],
            $this->modelMorph('Triage') => [
                'name' => 'Triage',
            ],
            $this->modelMorph('Vaccine') => [
                'name' => 'Riwayat Vaksinasi'
            ],
            $this->modelMorph('VisualImpairmentTest') => [
                "name" => "Formulir Gangguan Pengelihatan"    
            ],
            $this->modelMorph('VitalSign') => [
                'name' => 'Tanda Tanda Vital'
            ],
            $this->modelMorph('WastExamination') => [
                'name'    => 'PEMERIKSAAN KEKERASAN TERHADAP PEREMPUAN & ANAK',
                'form_has_survey' => [
                    "survey" => include(__DIR__ . '/data/forms/WastExamination.php')
                ]
            ],
            $this->modelMorph('WastTypeExamination') => [
                'name'    => 'JENIS KEKERASAN TERHADAP PEREMPUAN',
                'form_has_survey' => [
                    "survey" => include(__DIR__ . '/data/forms/WastTypeExamination.php')
                ]
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
            ]
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
        foreach ($forms as $label => $form) {
            $form['label'] = $label;
            try {
                $form_model = app(config('app.contracts.Form'))->prepareStoreForm(
                    $this->requestDTO(config('app.contracts.FormData'), $form),
                );
            } catch (\Throwable $th) {
                dd($th->getMessage());
                throw $th;
            }

            // $form_model = $this->__form->updateOrCreate([
            //     'parent_id' => $parent_id,
            //     'label'     => $label,
            //     'name'      => $form['name']
            // ]);

            // if (isset($form['prop']) && count($form['prop']) > 0){
            //     foreach ($form['prop'] as $prop_key => $prop) $form_model->{$prop_key} = $prop;
            //     $form_model->save();
            // }

            // if (isset($form['childs']) && count($form['childs']) > 0){
            //     $this->createForm($form['childs'],$form_model->getKey());
            // }

            // if (isset($surveys)){
            //     $surveys = $form['form_has_survey'] ?? [];
            //     if (!is_array($surveys)) $surveys = [$surveys];

            //     $attaches = [];
            //     foreach ($surveys as $survey) {
            //         $survey_model = $this->model('Survey')->updateOrCreate([
            //             'flag' => $survey['flag']
            //         ],[
            //             'name' => $survey['name']
            //         ]);

            //         if (isset($survey['props'])){
            //             $dynamic_forms = [];
            //             foreach ($survey['props']['dynamic_forms'] as $key => $dynamic_form){
            //                 $dynamic_form['ordering'] = $key + 1;
            //                 $dynamic_forms[] = $dynamic_form;
            //             }
            //             $survey_model->setAttribute('dynamic_forms', $dynamic_forms);
            //             $survey_model->save();
            //         }
            //         $attaches[] = $survey_model;
            //     }
            //     $form_model->surveys()->sync($attaches);
            // }
        }
    }
}
