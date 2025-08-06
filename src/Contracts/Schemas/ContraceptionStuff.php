<?php

namespace Hanafalah\ModuleExamination\Contracts\Schemas;

use Hanafalah\ModuleExamination\Contracts\Data\ContraceptionStuffData;
//use Hanafalah\ModuleExamination\Contracts\Data\ContraceptionStuffUpdateData;
use Hanafalah\LaravelSupport\Contracts\Supports\DataManagement;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * @see \Hanafalah\ModuleExamination\Schemas\ContraceptionStuff
 * @method mixed export(string $type)
 * @method self conditionals(mixed $conditionals)
 * @method array updateContraceptionStuff(?ContraceptionStuffData $contraception_stuff_dto = null)
 * @method Model prepareUpdateContraceptionStuff(ContraceptionStuffData $contraception_stuff_dto)
 * @method bool deleteContraceptionStuff()
 * @method bool prepareDeleteContraceptionStuff(? array $attributes = null)
 * @method mixed getContraceptionStuff()
 * @method ?Model prepareShowContraceptionStuff(?Model $model = null, ?array $attributes = null)
 * @method array showContraceptionStuff(?Model $model = null)
 * @method Collection prepareViewContraceptionStuffList()
 * @method array viewContraceptionStuffList()
 * @method LengthAwarePaginator prepareViewContraceptionStuffPaginate(PaginateData $paginate_dto)
 * @method array viewContraceptionStuffPaginate(?PaginateData $paginate_dto = null)
 * @method array storeContraceptionStuff(?ContraceptionStuffData $contraception_stuff_dto = null)
 * @method Collection prepareStoreMultipleContraceptionStuff(array $datas)
 * @method array storeMultipleContraceptionStuff(array $datas)
 */

interface ContraceptionStuff extends ExaminationStuff
{
    public function prepareStoreContraceptionStuff(ContraceptionStuffData $contraception_stuff_dto): Model;
    public function contraceptionStuff(mixed $conditionals = null): Builder;
}