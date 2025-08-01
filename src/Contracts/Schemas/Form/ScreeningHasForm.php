<?php

namespace Hanafalah\ModuleExamination\Contracts\Schemas\Form;

use Hanafalah\LaravelSupport\Contracts\Supports\DataManagement;
use Hanafalah\ModuleExamination\Contracts\Data\Form\ScreeningHasFormData;

/**
 * @see \Hanafalah\ModuleExamination\Schemas\Form\ScreeningHasForm
 * @method self setParamLogic(string $logic, bool $search_value = false, ?array $optionals = [])
 * @method self conditionals(mixed $conditionals)
 * @method mixed export(string $type)
 * @method bool deleteScreeningHasForm()
 * @method bool prepareDeleteScreeningHasForm(? array $attributes = null)
 * @method mixed getScreeningHasForm()
 * @method ?Model prepareShowScreeningHasForm(?Model $model = null, ?array $attributes = null)
 * @method array showScreeningHasForm(?Model $model = null)
 * @method Collection prepareViewScreeningHasFormList()
 * @method array viewScreeningHasFormList()
 * @method LengthAwarePaginator prepareViewScreeningHasFormPaginate(PaginateData $paginate_dto)
 * @method array viewScreeningHasFormPaginate(?PaginateData $paginate_dto = null)
 * @method array storeScreeningHasForm(?ScreeningHasFormData $screening_has_form_dto = null)
 * @method Builder screening(mixed $conditionals = null)
 */
interface ScreeningHasForm extends DataManagement{}
