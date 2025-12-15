<?php

namespace Hanafalah\ModuleExamination\Schemas\Examination;

use Hanafalah\ModuleExamination\Contracts;
use Hanafalah\ModuleExamination\Contracts\Data\Examination\PatientIllnessData;
use Hanafalah\ModuleExamination\Schemas\Examination;
use Illuminate\Database\Eloquent\Model;

class PatientIllness extends Examination implements Contracts\Schemas\Examination\PatientIllness
{
    protected string $__entity   = 'PatientIllness';
    public $patient_illness_model;

    protected array $__cache = [
        'index' => [
            'name'      => 'patient-illness',
            'tags'      => ['examination', 'patient-illness', 'patient-illness-index'],
            'duration'  => 30
        ]
    ];

    public function prepareStorePatientIllness(PatientIllnessData $patient_illness_dto): Model
    {
        $add = [
            'name'                      => $patient_illness_dto->name,
            'classification_disease_id' => $patient_illness_dto->classification_disease_id,
            'disease_type'              => $patient_illness_dto->disease_type,
            'disease_id'                => $patient_illness_dto->disease_id,
            'disease_name'              => $patient_illness_dto->disease_name,
        ];
        if (isset($patient_illness_dto->id)) {
            $guard = ['id' => $patient_illness_dto->id];
        } else {
            $guard = [
                'id' => null,
                'reference_type' => $patient_illness_dto->reference_type,
                'reference_id' => $patient_illness_dto->reference_id,
                'patient_id' => $patient_illness_dto->patient_id,
                'examination_summary_id' => $patient_illness_dto->examination_summary_id,
                'patient_summary_id' => $patient_illness_dto->patient_summary_id,
            ];
        }

        $patient_illness = $this->usingEntity()->updateOrCreate($guard, $add);
        $this->fillingProps($patient_illness, $patient_illness_dto->props);
        $patient_illness->save();
        return $this->patient_illness_model = $patient_illness;
    }
}
