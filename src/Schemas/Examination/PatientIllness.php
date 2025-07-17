<?php

namespace Hanafalah\ModuleExamination\Schemas\Examination;

use Hanafalah\ModuleExamination\Contracts;
use Hanafalah\ModuleExamination\Schemas\Examination;
use Hanafalah\ModuleExamination\Resources\Examination\PatientIllness\{
    ShowPatientIllness,
    ViewPatientIllness
};
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

class PatientIllness extends Examination implements Contracts\Schemas\Examination\PatientIllness
{
    protected string $__entity   = 'PatientIllness';
    public static $patient_illness_model;

    protected array $__resources = [
        'view' => ViewPatientIllness::class,
        'show' => ShowPatientIllness::class
    ];

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

        return static::$patient_illness_model = $patient_illness;
    }

    public function prepareViewPatientIllnessList(?array $attributes = null): Collection
    {
        $attributes ??= request()->all();
        return static::$patient_illness_model = $this->patientIllness()->get();
    }

    public function viewPatientIllnessList(): array
    {
        return $this->transforming($this->__resources['view'], function () {
            return $this->prepareViewPatientIllnessList();
        });
    }

    public function prepareViewPatientIllnessPaginate(int $perPage = 50, array $columns = ['*'], string $pageName = 'page', ?int $page = null, ?int $total = null): LengthAwarePaginator
    {
        $paginate_options = compact('perPage', 'columns', 'pageName', 'page', 'total');
        return static::$patient_illness_model = $this->patientIllness()->paginate($perPage);
    }

    public function viewPatientIllnessPaginate(int $perPage = 50, array $columns = ['*'], string $pageName = 'page', ?int $page = null, ?int $total = null): array
    {
        $paginate_options = compact('perPage', 'columns', 'pageName', 'page', 'total');
        return $this->transforming($this->__resources['view'], function () use ($paginate_options) {
            return $this->prepareViewPatientIllnessPaginate(...$this->arrayValues($paginate_options));
        });
    }

    public function patientIllness(mixed $conditionals = null): Builder
    {
        $this->booting();
        return $this->PatientIllnessModel()->withParameters()->conditionals($conditionals)->orderBy('created_at', 'desc');
    }
}
