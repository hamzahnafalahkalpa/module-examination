<?php

namespace Hanafalah\ModuleExamination\Contracts\Schemas;

use Hanafalah\ModuleExamination\Contracts\Data\TriageStuffData;
//use Hanafalah\ModuleExamination\Contracts\Data\TriageStuffUpdateData;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * @see \Hanafalah\ModuleExamination\Schemas\TriageStuff
 * @method mixed export(string $type)
 * @method self conditionals(mixed $conditionals)
 * @method array updateTriageStuff(?TriageStuffData $allergy_stuff_dto = null)
 * @method Model prepareUpdateTriageStuff(TriageStuffData $allergy_stuff_dto)
 * @method bool deleteTriageStuff()
 * @method bool prepareDeleteTriageStuff(? array $attributes = null)
 * @method mixed getTriageStuff()
 * @method ?Model prepareShowTriageStuff(?Model $model = null, ?array $attributes = null)
 * @method array showTriageStuff(?Model $model = null)
 * @method Collection prepareViewTriageStuffList()
 * @method array viewTriageStuffList()
 * @method LengthAwarePaginator prepareViewTriageStuffPaginate(PaginateData $paginate_dto)
 * @method array viewTriageStuffPaginate(?PaginateData $paginate_dto = null)
 * @method array storeTriageStuff(?TriageStuffData $allergy_stuff_dto = null)
 * @method Collection prepareStoreMultipleTriageStuff(array $datas)
 * @method array storeMultipleTriageStuff(array $datas)
 */

interface TriageStuff extends ExaminationStuff
{
    public function prepareStoreTriageStuff(TriageStuffData $allergy_stuff_dto): Model;
    public function triageStuff(mixed $conditionals = null): Builder;
}