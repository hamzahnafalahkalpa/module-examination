<?php

namespace Hanafalah\ModuleExamination\Contracts\Schemas;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Hanafalah\LaravelSupport\Contracts\Supports\DataManagement;

interface MasterVaccine extends DataManagement
{
    public function showUsingRelation(): array;
    public function getMasterVaccine(): mixed;
    public function prepareShowMasterVaccine(?Model $model = null, ?array $attributes = null): Model;
    public function showMasterVaccine(?Model $model = null): array;
    public function prepareViewMasterVaccineList(?array $attributes = null): Collection;
    public function viewMasterVaccineList(): array;
    public function prepareStoreMasterVaccine(?array $attributes = null): Model;
    public function storeMasterVaccine(): array;
    public function prepareDeleteMasterVaccine(?array $attributes = null): bool;
    public function deleteMasterVaccine(): bool;
    public function masterVaccine(): Builder;
}
