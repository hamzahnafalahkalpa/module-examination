<?php

namespace Hanafalah\ModuleExamination\Contracts\Schemas\Form;

use Hanafalah\LaravelSupport\Contracts\Schemas\Unicode;
use Hanafalah\ModuleExamination\Contracts\Data\Form\FormData;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * @see \Hanafalah\ModuleExamination\Schemas\Form\Form
 * @method self setParamLogic(string $logic, bool $search_value = false, ?array $optionals = [])
 * @method self conditionals(mixed $conditionals)
 * @method mixed export(string $type)
 * @method bool deleteForm()
 * @method bool prepareDeleteForm(? array $attributes = null)
 * @method mixed getForm()
 * @method ?Model prepareShowForm(?Model $model = null, ?array $attributes = null)
 * @method array showForm(?Model $model = null)
 * @method Collection prepareViewFormList()
 * @method array viewFormList()
 * @method LengthAwarePaginator prepareViewFormPaginate(PaginateData $paginate_dto)
 * @method array viewFormPaginate(?PaginateData $paginate_dto = null)
 * @method array storeForm(?FormData $form_dto = null)
 * @method Builder form(mixed $conditionals = null)
 */
interface Form extends Unicode {
    public function prepareStoreForm(FormData $form_dto): Model;
    public function form(mixed $conditionals = null): Builder;
}
