<?php

namespace Hanafalah\ModuleExamination\Schemas;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Hanafalah\ModuleExamination\{
    Supports\BaseModuleExamination
};
use Hanafalah\ModuleExamination\Contracts\Schemas\MasterSurvey as ContractsMasterSurvey;
use Hanafalah\ModuleExamination\Contracts\Data\MasterSurveyData;

class MasterSurvey extends BaseModuleExamination implements ContractsMasterSurvey
{
    protected string $__entity = 'MasterSurvey';
    public static $master_survey_model;
    //protected mixed $__order_by_created_at = false; //asc, desc, false

    protected array $__cache = [
        'index' => [
            'name'     => 'master_survey',
            'tags'     => ['master_survey', 'master_survey-index'],
            'duration' => 24 * 60
        ]
    ];

    public function prepareStoreMasterSurvey(MasterSurveyData $master_survey_dto): Model{
        $add = [
            'name' => $master_survey_dto->name
        ];
        $guard  = ['id' => $master_survey_dto->id];
        $create = [$guard, $add];
        // if (isset($master_survey_dto->id)){
        //     $guard  = ['id' => $master_survey_dto->id];
        //     $create = [$guard, $add];
        // }else{
        //     $create = [$add];
        // }

        $master_survey = $this->usingEntity()->updateOrCreate(...$create);
        $this->fillingProps($master_survey,$master_survey_dto->props);
        $master_survey->save();
        return static::$master_survey_model = $master_survey;
    }
}