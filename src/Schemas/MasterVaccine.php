<?php

namespace Hanafalah\ModuleExamination\Schemas;

use Hanafalah\ModuleExamination\Contracts\MasterVaccine as ContractsMasterVaccine;
use Hanafalah\ModuleExamination\Resources\MasterVaccine\{
    ViewMasterVaccine,
    ShowMasterVaccine
};
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Hanafalah\LaravelSupport\Supports\PackageManagement;

class MasterVaccine extends PackageManagement implements ContractsMasterVaccine
{
    protected array $__guard   = ['id', 'name', 'update_able'];
    protected array $__add     = [];
    protected string $__entity = 'MasterVaccine';
    public static $master_vaccine;

    protected array $__resources = [
        'view' => ViewMasterVaccine::class,
        'show' => ShowMasterVaccine::class
    ];

    public function showUsingRelation(): array
    {
        return [];
    }

    public function getMasterVaccine(): mixed
    {
        return static::$master_vaccine;
    }

    public function prepareShowMasterVaccine(?Model $model = null, ?array $attributes = null): Model
    {
        $attributes ??= request()->all();

        $model ??= $this->getMasterVaccine();
        if (!isset($model)) {
            $id = $attributes['id'] ?? null;
            if (!isset($id)) throw new \Exception('MasterVaccine not found');
            $model = $this->masterVaccine()->with($this->showUsingRelation())->findOrFail($id);
        } else {
            $model->load($this->showUsingRelation());
        }

        return static::$master_vaccine = $model;
    }

    public function showMasterVaccine(?Model $model = null): array
    {
        return $this->transforming($this->__resources['show'], function () use ($model) {
            return $this->prepareShowMasterVaccine($model);
        });
    }

    public function prepareViewMasterVaccineList(?array $attributes = null): Collection
    {
        $attributes ??= \request()->all();

        $master_vaccine = $this->masterVaccine()->orderBy('name', 'asc')->get();
        return static::$master_vaccine = $master_vaccine;
    }

    public function viewMasterVaccineList(): array
    {
        return $this->transforming($this->__resources['view'], function () {
            return $this->prepareViewMasterVaccineList();
        });
    }

    public function prepareStoreMasterVaccine(?array $attributes = null): Model
    {
        $attributes ??= request()->all();

        $model = $this->masterVaccine()->updateOrCreate([
            'id' => $attributes['id'] ?? null
        ], [
            'name'        => $attributes['name'],
            'update_able' => $attributes['update_able'] ?? true
        ]);

        return static::$master_vaccine = $model;
    }

    public function storeMasterVaccine(): array
    {
        return $this->transaction(function () {
            return $this->showMasterVaccine($this->prepareStoreMasterVaccine());
        });
    }

    public function prepareDeleteMasterVaccine(?array $attributes = null): bool
    {
        $attributes ??= request()->all();
        if (!isset($attributes['id'])) throw new \Exception('MasterVaccine not found');

        $master_vaccine = $this->masterVaccine()->findOrFail($attributes['id']);
        if ($master_vaccine->update_able) {
            return $master_vaccine->delete();
        }
        throw new \Exception('MasterVaccine cannot be deleted');
    }

    public function deleteMasterVaccine(): bool
    {
        return $this->transaction(function () {
            return $this->prepareDeleteMasterVaccine();
        });
    }

    public function masterVaccine(): Builder
    {
        $this->booting();
        return $this->MasterVaccineModel()->withParameters()->orderBy('name', 'asc');
    }
}
