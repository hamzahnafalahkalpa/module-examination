<?php

namespace Hanafalah\ModuleExamination\Contracts\Schemas;

use Hanafalah\ModuleExamination\Contracts\Data\AllergyStuffData;
//use Hanafalah\ModuleExamination\Contracts\Data\AllergyStuffUpdateData;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * @see \Hanafalah\ModuleExamination\Schemas\AllergyStuff
 * @method mixed export(string $type)
 * @method self conditionals(mixed $conditionals)
 * @method array updateAllergyStuff(?AllergyStuffData $allergy_stuff_dto = null)
 * @method Model prepareUpdateAllergyStuff(AllergyStuffData $allergy_stuff_dto)
 * @method bool deleteAllergyStuff()
 * @method bool prepareDeleteAllergyStuff(? array $attributes = null)
 * @method mixed getAllergyStuff()
 * @method ?Model prepareShowAllergyStuff(?Model $model = null, ?array $attributes = null)
 * @method array showAllergyStuff(?Model $model = null)
 * @method Collection prepareViewAllergyStuffList()
 * @method array viewAllergyStuffList()
 * @method LengthAwarePaginator prepareViewAllergyStuffPaginate(PaginateData $paginate_dto)
 * @method array viewAllergyStuffPaginate(?PaginateData $paginate_dto = null)
 * @method array storeAllergyStuff(?AllergyStuffData $allergy_stuff_dto = null)
 * @method Collection prepareStoreMultipleAllergyStuff(array $datas)
 * @method array storeMultipleAllergyStuff(array $datas)
 */

interface AllergyStuff extends ExaminationStuff
{
    public function prepareStoreAllergyStuff(AllergyStuffData $allergy_stuff_dto): Model;
    public function allergyStuff(mixed $conditionals = null): Builder;
}