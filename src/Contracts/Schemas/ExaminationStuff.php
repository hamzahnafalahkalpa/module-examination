<?php

namespace Hanafalah\ModuleExamination\Contracts\Schemas;

use Hanafalah\LaravelSupport\Contracts\Schemas\Unicode;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Hanafalah\ModuleExamination\Contracts\Data\ExaminationStuffData;
use Illuminate\Database\Eloquent\Model;

/**
 * @see \Hanafalah\ModuleExamination\Schemas\ExaminationStuff
 * @method self setParamLogic(string $logic, bool $search_value = false, ?array $optionals = [])
 * @method self conditionals(mixed $conditionals)
 * @method mixed export(string $type)
 * @method bool deleteExaminationStuff()
 * @method bool prepareDeleteExaminationStuff(? array $attributes = null)
 * @method mixed getExaminationStuff()
 * @method ?Model prepareShowExaminationStuff(?Model $model = null, ?array $attributes = null)
 * @method array showExaminationStuff(?Model $model = null)
 * @method Collection prepareViewExaminationStuffList()
 * @method array viewExaminationStuffList()
 * @method LengthAwarePaginator prepareViewExaminationStuffPaginate(PaginateData $paginate_dto)
 * @method array viewExaminationStuffPaginate(?PaginateData $paginate_dto = null)
 * @method array storeExaminationStuff(?ExaminationStuffData $examination_stuff_dto = null)
 * @method Builder examinationStuff(mixed $conditionals = null)
 */
interface ExaminationStuff extends Unicode
{
    public function prepareStoreExaminationStuff(ExaminationStuffData $examination_stuff_dto): Model;    
    public function examinationStuff(mixed $conditionals = null): Builder;
}
