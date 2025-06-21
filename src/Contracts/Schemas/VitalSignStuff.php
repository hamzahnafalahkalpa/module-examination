<?php

namespace Hanafalah\ModuleExamination\Contracts\Schemas;

use Hanafalah\ModuleExamination\Contracts\Data\VitalSignStuffData;
//use Hanafalah\ModuleExamination\Contracts\Data\VitalSignStuffUpdateData;
use Hanafalah\LaravelSupport\Contracts\Supports\DataManagement;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * @see \Hanafalah\ModuleExamination\Schemas\VitalSignStuff
 * @method mixed export(string $type)
 * @method self conditionals(mixed $conditionals)
 * @method array updateVitalSignStuff(?VitalSignStuffData $vital_sign_stuff_dto = null)
 * @method Model prepareUpdateVitalSignStuff(VitalSignStuffData $vital_sign_stuff_dto)
 * @method bool deleteVitalSignStuff()
 * @method bool prepareDeleteVitalSignStuff(? array $attributes = null)
 * @method mixed getVitalSignStuff()
 * @method ?Model prepareShowVitalSignStuff(?Model $model = null, ?array $attributes = null)
 * @method array showVitalSignStuff(?Model $model = null)
 * @method Collection prepareViewVitalSignStuffList()
 * @method array viewVitalSignStuffList()
 * @method LengthAwarePaginator prepareViewVitalSignStuffPaginate(PaginateData $paginate_dto)
 * @method array viewVitalSignStuffPaginate(?PaginateData $paginate_dto = null)
 * @method array storeVitalSignStuff(?VitalSignStuffData $vital_sign_stuff_dto = null)
 * @method Collection prepareStoreMultipleVitalSignStuff(array $datas)
 * @method array storeMultipleVitalSignStuff(array $datas)
 */

interface VitalSignStuff extends DataManagement
{
    public function prepareStoreVitalSignStuff(VitalSignStuffData $vital_sign_stuff_dto): Model;
}