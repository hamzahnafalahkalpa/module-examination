<?php

namespace Hanafalah\ModuleExamination\Contracts\Schemas\Form;

use Hanafalah\ModuleExamination\Contracts\Data\Form\ScreeningData;

/**
 * @see \Hanafalah\ModuleExamination\Schemas\Form\Screening
 * @method self setParamLogic(string $logic, bool $search_value = false, ?array $optionals = [])
 * @method self conditionals(mixed $conditionals)
 * @method mixed export(string $type)
 * @method bool deleteScreening()
 * @method bool prepareDeleteScreening(? array $attributes = null)
 * @method mixed getScreening()
 * @method ?Model prepareShowScreening(?Model $model = null, ?array $attributes = null)
 * @method array showScreening(?Model $model = null)
 * @method Collection prepareViewScreeningList()
 * @method array viewScreeningList()
 * @method LengthAwarePaginator prepareViewScreeningPaginate(PaginateData $paginate_dto)
 * @method array viewScreeningPaginate(?PaginateData $paginate_dto = null)
 * @method array storeScreening(?ScreeningData $screening_dto = null)
 * @method Builder screening(mixed $conditionals = null)
 */
interface Screening extends Form{}
