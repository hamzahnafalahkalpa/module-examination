<?php

namespace Gii\ModuleExamination\Contracts\Examination;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Gii\ModuleExamination\Contracts\Examination as ContractsExamination;

interface PatientIllness extends ContractsExamination{
    public function prepareStorePatientIllness(? array $attributes = null): Model;
    public function prepareViewPatientIllnessList(? array $attributes = null): Collection;
    public function viewPatientIllnessList(): array;
    public function prepareViewPatientIllnessPaginate(int $perPage = 50, array $columns = ['*'], string $pageName = 'page',? int $page = null,? int $total = null): LengthAwarePaginator;
    public function viewPatientIllnessPaginate(int $perPage = 50, array $columns = ['*'], string $pageName = 'page',? int $page = null,? int $total = null): array;
    public function patientIllness(mixed $conditionals = null): Builder;
    
}
