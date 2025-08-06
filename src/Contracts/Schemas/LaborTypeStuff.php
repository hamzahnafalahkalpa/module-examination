<?php

namespace Hanafalah\ModuleExamination\Contracts\Schemas;

use Hanafalah\ModuleExamination\Contracts\Data\LaborTypeStuffData;
//use Hanafalah\ModuleExamination\Contracts\Data\LaborTypeStuffUpdateData;
use Hanafalah\LaravelSupport\Contracts\Supports\DataManagement;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * @see \Hanafalah\ModuleExamination\Schemas\LaborTypeStuff
 * @method mixed export(string $type)
 * @method self conditionals(mixed $conditionals)
 * @method array updateLaborTypeStuff(?LaborTypeStuffData $labor_type_stuff_dto = null)
 * @method Model prepareUpdateLaborTypeStuff(LaborTypeStuffData $labor_type_stuff_dto)
 * @method bool deleteLaborTypeStuff()
 * @method bool prepareDeleteLaborTypeStuff(? array $attributes = null)
 * @method mixed getLaborTypeStuff()
 * @method ?Model prepareShowLaborTypeStuff(?Model $model = null, ?array $attributes = null)
 * @method array showLaborTypeStuff(?Model $model = null)
 * @method Collection prepareViewLaborTypeStuffList()
 * @method array viewLaborTypeStuffList()
 * @method LengthAwarePaginator prepareViewLaborTypeStuffPaginate(PaginateData $paginate_dto)
 * @method array viewLaborTypeStuffPaginate(?PaginateData $paginate_dto = null)
 * @method array storeLaborTypeStuff(?LaborTypeStuffData $labor_type_stuff_dto = null)
 * @method Collection prepareStoreMultipleLaborTypeStuff(array $datas)
 * @method array storeMultipleLaborTypeStuff(array $datas)
 */

interface LaborTypeStuff extends ExaminationStuff
{
    public function prepareStoreLaborTypeStuff(LaborTypeStuffData $labor_type_stuff_dto): Model;
    public function laborTypeStuff(mixed $conditionals = null): Builder;
}