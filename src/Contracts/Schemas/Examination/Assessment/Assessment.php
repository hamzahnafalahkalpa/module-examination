<?php

namespace Hanafalah\ModuleExamination\Contracts\Schemas\Examination\Assessment;

use Hanafalah\ModuleExamination\Contracts\Schemas\Examination;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

interface Assessment extends Examination
{
    public function prepareViewAssessmentList(?array $attributes = null): Collection;
    public function prepareStore(?array $attributes = null): Model;
    public function prepareStoreAssessment(?array $attributes = null): Model;
    public function storeAssessment(): array;
    public function getAssessment(): mixed;
    public function prepareShowAssessment(?Model $model = null, ?array $attributes = null): mixed;
    public function showAssessment(?Model $model = null): ?array;
    public function viewAssessmentList(): array;
    public function prepareViewAssessmentPaginate(int $perPage = 50, array $columns = ['*'], string $pageName = 'page', ?int $page = null, ?int $total = null): LengthAwarePaginator;
    public function viewAssessmentPaginate(int $perPage = 50, array $columns = ['*'], string $pageName = 'page', ?int $page = null, ?int $total = null): array;
    public function assessment(mixed $conditionals = null): Builder;
    public function prepareShowPatientEmrByFlag(?array $attributes = null): mixed;
    public function showPatientEmrByFlag(): array;
}
