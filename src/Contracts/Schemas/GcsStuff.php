<?php

namespace Hanafalah\ModuleExamination\Contracts\Schemas;

use Hanafalah\ModuleExamination\Contracts\Data\GcsStuffData;
//use Hanafalah\ModuleExamination\Contracts\Data\GcsStuffUpdateData;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * @see \Hanafalah\ModuleExamination\Schemas\GcsStuff
 * @method mixed export(string $type)
 * @method self conditionals(mixed $conditionals)
 * @method array updateGcsStuff(?GcsStuffData $gcs_stuff_dto = null)
 * @method Model prepareUpdateGcsStuff(GcsStuffData $gcs_stuff_dto)
 * @method bool deleteGcsStuff()
 * @method bool prepareDeleteGcsStuff(? array $attributes = null)
 * @method mixed getGcsStuff()
 * @method ?Model prepareShowGcsStuff(?Model $model = null, ?array $attributes = null)
 * @method array showGcsStuff(?Model $model = null)
 * @method Collection prepareViewGcsStuffList()
 * @method array viewGcsStuffList()
 * @method LengthAwarePaginator prepareViewGcsStuffPaginate(PaginateData $paginate_dto)
 * @method array viewGcsStuffPaginate(?PaginateData $paginate_dto = null)
 * @method array storeGcsStuff(?GcsStuffData $gcs_stuff_dto = null)
 * @method Collection prepareStoreMultipleGcsStuff(array $datas)
 * @method array storeMultipleGcsStuff(array $datas)
 */

interface GcsStuff extends ExaminationStuff
{
    public function prepareStoreGcsStuff(GcsStuffData $gcs_stuff_dto): Model;
    public function gcsStuff(mixed $conditionals = null): Builder;
}