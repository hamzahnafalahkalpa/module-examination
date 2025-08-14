<?php

namespace Hanafalah\ModuleExamination\Contracts\Schemas;

use Hanafalah\ModuleExamination\Contracts\Data\HearingLossStuffData;
//use Hanafalah\ModuleExamination\Contracts\Data\HearingLossStuffUpdateData;
use Hanafalah\LaravelSupport\Contracts\Supports\DataManagement;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * @see \Hanafalah\ModuleExamination\Schemas\HearingLossStuff
 * @method mixed export(string $type)
 * @method self conditionals(mixed $conditionals)
 * @method array updateHearingLossStuff(?HearingLossStuffData $hearing_loss_stuff_dto = null)
 * @method Model prepareUpdateHearingLossStuff(HearingLossStuffData $hearing_loss_stuff_dto)
 * @method bool deleteHearingLossStuff()
 * @method bool prepareDeleteHearingLossStuff(? array $attributes = null)
 * @method mixed getHearingLossStuff()
 * @method ?Model prepareShowHearingLossStuff(?Model $model = null, ?array $attributes = null)
 * @method array showHearingLossStuff(?Model $model = null)
 * @method Collection prepareViewHearingLossStuffList()
 * @method array viewHearingLossStuffList()
 * @method LengthAwarePaginator prepareViewHearingLossStuffPaginate(PaginateData $paginate_dto)
 * @method array viewHearingLossStuffPaginate(?PaginateData $paginate_dto = null)
 * @method array storeHearingLossStuff(?HearingLossStuffData $hearing_loss_stuff_dto = null)
 * @method Collection prepareStoreMultipleHearingLossStuff(array $datas)
 * @method array storeMultipleHearingLossStuff(array $datas)
 */

interface HearingLossStuff extends ExaminationStuff
{
    public function prepareStoreHearingLossStuff(HearingLossStuffData $hearing_loss_stuff_dto): Model;
    public function hearingLossStuff(mixed $conditionals = null): Builder;
}