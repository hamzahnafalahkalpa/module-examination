<?php

namespace Hanafalah\ModuleExamination\Contracts\Schemas;

use Hanafalah\ModuleExamination\Contracts\Data\SingleTestStuffData;
//use Hanafalah\ModuleExamination\Contracts\Data\SingleTestStuffUpdateData;
use Hanafalah\LaravelSupport\Contracts\Supports\DataManagement;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * @see \Hanafalah\ModuleExamination\Schemas\SingleTestStuff
 * @method mixed export(string $type)
 * @method self conditionals(mixed $conditionals)
 * @method array updateSingleTestStuff(?SingleTestStuffData $single_test_stuff_dto = null)
 * @method Model prepareUpdateSingleTestStuff(SingleTestStuffData $single_test_stuff_dto)
 * @method bool deleteSingleTestStuff()
 * @method bool prepareDeleteSingleTestStuff(? array $attributes = null)
 * @method mixed getSingleTestStuff()
 * @method ?Model prepareShowSingleTestStuff(?Model $model = null, ?array $attributes = null)
 * @method array showSingleTestStuff(?Model $model = null)
 * @method Collection prepareViewSingleTestStuffList()
 * @method array viewSingleTestStuffList()
 * @method LengthAwarePaginator prepareViewSingleTestStuffPaginate(PaginateData $paginate_dto)
 * @method array viewSingleTestStuffPaginate(?PaginateData $paginate_dto = null)
 * @method array storeSingleTestStuff(?SingleTestStuffData $single_test_stuff_dto = null)
 * @method Collection prepareStoreMultipleSingleTestStuff(array $datas)
 * @method array storeMultipleSingleTestStuff(array $datas)
 */

interface SingleTestStuff extends ExaminationStuff
{
    public function prepareStoreSingleTestStuff(SingleTestStuffData $single_test_stuff_dto): Model;
    public function singleTestStuff(mixed $conditionals = null): Builder;
}