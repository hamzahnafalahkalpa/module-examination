<?php

namespace Hanafalah\ModuleExamination\Contracts\Schemas;

use Hanafalah\ModuleExamination\Contracts\Data\BirthHelperStuffData;
//use Hanafalah\ModuleExamination\Contracts\Data\BirthHelperStuffUpdateData;
use Hanafalah\LaravelSupport\Contracts\Supports\DataManagement;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * @see \Hanafalah\ModuleExamination\Schemas\BirthHelperStuff
 * @method mixed export(string $type)
 * @method self conditionals(mixed $conditionals)
 * @method array updateBirthHelperStuff(?BirthHelperStuffData $birth_helper_stuff_dto = null)
 * @method Model prepareUpdateBirthHelperStuff(BirthHelperStuffData $birth_helper_stuff_dto)
 * @method bool deleteBirthHelperStuff()
 * @method bool prepareDeleteBirthHelperStuff(? array $attributes = null)
 * @method mixed getBirthHelperStuff()
 * @method ?Model prepareShowBirthHelperStuff(?Model $model = null, ?array $attributes = null)
 * @method array showBirthHelperStuff(?Model $model = null)
 * @method Collection prepareViewBirthHelperStuffList()
 * @method array viewBirthHelperStuffList()
 * @method LengthAwarePaginator prepareViewBirthHelperStuffPaginate(PaginateData $paginate_dto)
 * @method array viewBirthHelperStuffPaginate(?PaginateData $paginate_dto = null)
 * @method array storeBirthHelperStuff(?BirthHelperStuffData $birth_helper_stuff_dto = null)
 * @method Collection prepareStoreMultipleBirthHelperStuff(array $datas)
 * @method array storeMultipleBirthHelperStuff(array $datas)
 */

interface BirthHelperStuff extends ExaminationStuff
{
    public function prepareStoreBirthHelperStuff(BirthHelperStuffData $birth_helper_stuff_dto): Model;
    public function birthHelperStuff(mixed $conditionals = null): Builder;
}