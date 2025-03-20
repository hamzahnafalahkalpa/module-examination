<?php

namespace Hanafalah\ModuleExamination\Seeders;

use Hanafalah\ModuleExamination\Models\Form\Form;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class FormSeeder extends Seeder
{
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
            $this->model('Triage') => [
                'name' => 'Triage',
            ],
            $this->model('GCS') => [
                'name' => 'Glasgow Coma Scale',
            ],
            $this->model('Allergy') => [
                'name' => 'Riwayat Alergi Pasien'
            ],
            $this->model('VitalSign') => [
                'name' => 'Tanda Tanda Vital'
            ],
            $this->model('Symptom') => [
                'name' => 'Gejala & Keluhan'
            ],
            $this->model('PainScale') => [
                'name' => 'Sekala Nyeri'
            ],
            $this->model('Alloanamnese') => [
                'name' => 'Alloanamnese'
            ],
            $this->model('InitialDiagnose') => [
                'name'  => 'Diagnosa Awal/Masuk'
            ],
            $this->model('PrimaryDiagnose') => [
                'name'  => 'Diagnosa Primer'
            ],
            $this->model('SecondaryDiagnose') => [
                'name'  => 'Diagnosa Sekunder'
            ],
            $this->model('HistoryIllness') => [
                'name' => 'Riwayat Penyakit Patient'
            ],
            $this->model('FamilyIllness') => [
                'name' => 'Riwayat Penyakit Keluarga Patient'
            ],
            $this->model('PhysicalExamination') => [
                'name' => 'Pemeriksaan Fisik'
            ],
            $this->model('FoodHandlerExamination') => [
                'name' => 'Pemeriksaan Food Handler'
            ],
            $this->model('Odontogram') => [
                'name' => 'Odontogram'
            ],
            $this->model('EyeExamination') => [
                "name" => "Pemeriksaan Mata Lengkap"
            ],
            $this->model('EyeRefractionExamination') => [
                "name" => "Refraksi Mata"
            ],
            $this->model('EyeVisionColor') => [
                "name" => "Pemeriksaan matan dan Color Vision"
            ],
            $this->model('Anthropometry') => [
                'name' => 'Anthropometry'
            ],
            $this->model('EarExamination') => [
                'name' => 'Pemeriksaan Telinga'
            ],
            $this->model('LarynxExamination') => [
                'name' => 'Pemeriksaan Laring'
            ],
            $this->model('NoseExamination') => [
                'name' => 'Pemeriksaan Hidung'
            ],
            $this->model('ThroatExamination') => [
                'name' => 'Pemeriksaan Tenggorokan'
            ],
            $this->model('MCUMedicalHistory') => [
                'name' => 'Riwayat Penyakit Medis MCU'
            ],
            $this->model('MCUExamSummary') => [
                'name' => 'Summary Pemeriksaan MCU'
            ],
            $this->model('MCUPresentMedicalHistory') => [
                'name' => 'Kondisi Pasien MCU'
            ],
            $this->model('MCUPackageSummary') => [
                'name' => 'Hasil Akhir MCU'
            ],
            $this->model('SOAP') => [
                'name' => 'SOAP'
            ],
            $this->model('Vaccine') => [
                'name' => 'Riwayat Vaksinasi'
            ]
        ];
        $this->createForm($forms);
    }

    private function model(string $model): string
    {
        return app(config('database.models.' . $model))->getMorphClass();
    }

    private function createForm($forms, $parent_id = null)
    {
        foreach ($forms as $morph => $form) {
            $form_model = $this->__form->updateOrCreate([
                'parent_id' => $parent_id,
                'morph'     => $morph,
                'name'      => $form['name']
            ]);

            if (isset($val['prop']) && count($val['prop']) > 0) {
                foreach ($val['prop'] as $prop_key => $prop) $form_model->{$prop_key} = $prop;
                $form_model->save();
            }

            if (isset($val['childs']) && count($val['childs']) > 0) {
                $this->createForm($val['childs'], $form_model->getKey());
            }
        }
    }
}
