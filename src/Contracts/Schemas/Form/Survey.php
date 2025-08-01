<?php

namespace Hanafalah\ModuleExamination\Contracts\Schemas\Form;

use Hanafalah\ModuleExamination\Contracts\Data\SurveyData;
use Hanafalah\ModuleExamination\Contracts\Schemas\ExaminationStuff;
//use Hanafalah\ModuleExamination\Contracts\Data\SurveyUpdateData;
use Illuminate\Database\Eloquent\Model;

/**
 * @see \Hanafalah\ModuleExamination\Schemas\Survey
 * @method mixed export(string $type)
 * @method self conditionals(mixed $conditionals)
 * @method array updateSurvey(?SurveyData $survey_dto = null)
 * @method Model prepareUpdateSurvey(SurveyData $survey_dto)
 * @method bool deleteSurvey()
 * @method bool prepareDeleteSurvey(? array $attributes = null)
 * @method mixed getSurvey()
 * @method ?Model prepareShowSurvey(?Model $model = null, ?array $attributes = null)
 * @method array showSurvey(?Model $model = null)
 * @method Collection prepareViewSurveyList()
 * @method array viewSurveyList()
 * @method LengthAwarePaginator prepareViewSurveyPaginate(PaginateData $paginate_dto)
 * @method array viewSurveyPaginate(?PaginateData $paginate_dto = null)
 * @method array storeSurvey(?SurveyData $survey_dto = null)
 * @method Collection prepareStoreMultipleSurvey(array $datas)
 * @method array storeMultipleSurvey(array $datas)
 */

interface Survey extends Form{}