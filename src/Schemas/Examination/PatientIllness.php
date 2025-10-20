<?php

namespace Hanafalah\ModuleExamination\Schemas\Examination;

use Hanafalah\ModuleExamination\Contracts;
use Hanafalah\ModuleExamination\Schemas\Examination;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

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

    public function prepareStorePatientIllness(?array $attributes = null): Model
    {
        $attributes ??= request()->all();

        if (isset($attributes['id'])) {
            $guard = ['id' => $attributes['id']];
        } else {
            $guards = [
                'reference_type',
                'reference_id',
                'disease_type',
                'disease_id',
                'patient_id',
                'examination_summary_id',
                'patient_summary_id',
            ];
            $guard = [];
            foreach ($guards as $guard_value) $guard[$guard_value] = $attributes[$guard_value] ?? null;
        }

        $add = [
            'classification_disease_id' => $attributes['classification_disease_id'],
            'disease_name'              => $attributes['disease_name'],
            'name'                      => $attributes['name']
        ];

        $patient_illness = $this->PatientIllnessModel()->updateOrCreate($guard, $add);

        return $this->patient_illness_model = $patient_illness;
    }
}
