<?php

namespace Hanafalah\ModuleExamination\Contracts\Schemas\Form;

use Hanafalah\ModuleExamination\Contracts\Data\Form\FormHasSurveyData;
//use Hanafalah\ModuleExamination\Contracts\Data\Form\FormHasSurveyUpdateData;
use Hanafalah\LaravelSupport\Contracts\Supports\DataManagement;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * @see \Hanafalah\ModuleExamination\Schemas\FormHasSurvey
 * @method mixed export(string $type)
 * @method self conditionals(mixed $conditionals)
 * @method array updateFormHasSurvey(?FormHasSurveyData $form_has_survey_dto = null)
 * @method Model prepareUpdateFormHasSurvey(FormHasSurveyData $form_has_survey_dto)
 * @method bool deleteFormHasSurvey()
 * @method bool prepareDeleteFormHasSurvey(? array $attributes = null)
 * @method mixed getFormHasSurvey()
 * @method ?Model prepareShowFormHasSurvey(?Model $model = null, ?array $attributes = null)
 * @method array showFormHasSurvey(?Model $model = null)
 * @method Collection prepareViewFormHasSurveyList()
 * @method array viewFormHasSurveyList()
 * @method LengthAwarePaginator prepareViewFormHasSurveyPaginate(PaginateData $paginate_dto)
 * @method array viewFormHasSurveyPaginate(?PaginateData $paginate_dto = null)
 * @method array storeFormHasSurvey(?FormHasSurveyData $form_has_survey_dto = null)
 * @method Collection prepareStoreMultipleFormHasSurvey(array $datas)
 * @method array storeMultipleFormHasSurvey(array $datas)
 */

interface FormHasSurvey extends DataManagement
{
    public function prepareStoreFormHasSurvey(FormHasSurveyData $form_has_survey_dto): Model;
}