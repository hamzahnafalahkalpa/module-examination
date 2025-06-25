<?php

namespace Hanafalah\ModuleExamination\Contracts\Schemas\Form;

use Hanafalah\ModuleExamination\Contracts\Data\MasterSurveyData;
use Hanafalah\ModuleExamination\Contracts\Schemas\ExaminationStuff;
//use Hanafalah\ModuleExamination\Contracts\Data\MasterSurveyUpdateData;
use Illuminate\Database\Eloquent\Model;

/**
 * @see \Hanafalah\ModuleExamination\Schemas\MasterSurvey
 * @method mixed export(string $type)
 * @method self conditionals(mixed $conditionals)
 * @method array updateMasterSurvey(?MasterSurveyData $master_survey_dto = null)
 * @method Model prepareUpdateMasterSurvey(MasterSurveyData $master_survey_dto)
 * @method bool deleteMasterSurvey()
 * @method bool prepareDeleteMasterSurvey(? array $attributes = null)
 * @method mixed getMasterSurvey()
 * @method ?Model prepareShowMasterSurvey(?Model $model = null, ?array $attributes = null)
 * @method array showMasterSurvey(?Model $model = null)
 * @method Collection prepareViewMasterSurveyList()
 * @method array viewMasterSurveyList()
 * @method LengthAwarePaginator prepareViewMasterSurveyPaginate(PaginateData $paginate_dto)
 * @method array viewMasterSurveyPaginate(?PaginateData $paginate_dto = null)
 * @method array storeMasterSurvey(?MasterSurveyData $master_survey_dto = null)
 * @method Collection prepareStoreMultipleMasterSurvey(array $datas)
 * @method array storeMultipleMasterSurvey(array $datas)
 */

interface MasterSurvey extends ExaminationStuff{}