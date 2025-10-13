<?php

namespace Hanafalah\ModuleExamination\Contracts\Schemas\Form;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * @see \Hanafalah\ModuleExamination\Schemas\Form\Soap
 * @method self setParamLogic(string $logic, bool $search_value = false, ?array $optionals = [])
 * @method self conditionals(mixed $conditionals)
 * @method mixed export(string $type)
 * @method bool deleteSoap()
 * @method bool prepareDeleteSoap(? array $attributes = null)
 * @method mixed getSoap()
 * @method ?Model prepareShowSoap(?Model $model = null, ?array $attributes = null)
 * @method array showSoap(?Model $model = null)
 * @method Collection prepareViewSoapList()
 * @method array viewSoapList()
 * @method LengthAwarePaginator prepareViewSoapPaginate(PaginateData $paginate_dto)
 * @method array viewSoapPaginate(?PaginateData $paginate_dto = null)
 * @method array storeSoap(?SoapData $form_dto = null)
 * @method Builder soap(mixed $conditionals = null)
 */
interface Soap extends Screening {}
