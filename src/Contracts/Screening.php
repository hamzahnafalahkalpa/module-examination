<?php

namespace Hanafalah\ModuleExamination\Contracts;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface Screening extends Form
{
    public function getScreening(): mixed;
    public function prepareShowScreening(?Model $model = null, ?array $attributes = null): Model;
    public function showScreening(?Model $model = null): array;
    public function prepareStoreScreening(?array $attributes = null): Model;
    public function storeScreening(): array;
    public function prepareviewScreeningList(?array $attributes = null): Collection;
    public function viewScreeningList(): array;
    public function prepareDeleteScreening(?array $attributes = null): bool;
    public function deleteScreening(): bool;
    public function form();
    public function screening($conditionals);
}
