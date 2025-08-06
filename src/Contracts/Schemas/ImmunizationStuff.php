<?php

namespace Hanafalah\ModuleExamination\Contracts\Schemas;

use Hanafalah\ModuleExamination\Contracts\Data\ImmunizationStuffData;
//use Hanafalah\ModuleExamination\Contracts\Data\ImmunizationStuffUpdateData;
use Hanafalah\LaravelSupport\Contracts\Supports\DataManagement;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * @see \Hanafalah\ModuleExamination\Schemas\ImmunizationStuff
 * @method mixed export(string $type)
 * @method self conditionals(mixed $conditionals)
 * @method array updateImmunizationStuff(?ImmunizationStuffData $immunization_stuff_dto = null)
 * @method Model prepareUpdateImmunizationStuff(ImmunizationStuffData $immunization_stuff_dto)
 * @method bool deleteImmunizationStuff()
 * @method bool prepareDeleteImmunizationStuff(? array $attributes = null)
 * @method mixed getImmunizationStuff()
 * @method ?Model prepareShowImmunizationStuff(?Model $model = null, ?array $attributes = null)
 * @method array showImmunizationStuff(?Model $model = null)
 * @method Collection prepareViewImmunizationStuffList()
 * @method array viewImmunizationStuffList()
 * @method LengthAwarePaginator prepareViewImmunizationStuffPaginate(PaginateData $paginate_dto)
 * @method array viewImmunizationStuffPaginate(?PaginateData $paginate_dto = null)
 * @method array storeImmunizationStuff(?ImmunizationStuffData $immunization_stuff_dto = null)
 * @method Collection prepareStoreMultipleImmunizationStuff(array $datas)
 * @method array storeMultipleImmunizationStuff(array $datas)
 */

interface ImmunizationStuff extends ExaminationStuff
{
    public function prepareStoreImmunizationStuff(ImmunizationStuffData $immunization_stuff_dto): Model;
    public function immunizationStuff(mixed $conditionals = null): Builder;
}