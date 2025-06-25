<?php

namespace Hanafalah\ModuleExamination\Models\Form;

use Hanafalah\ModuleExamination\Models\ExaminationStuff;
use Hanafalah\ModuleExamination\Resources\MasterSurvey\{
    ViewMasterSurvey,
    ShowMasterSurvey
};
use Illuminate\Database\Eloquent\Concerns\HasUlids;

class MasterSurvey extends ExaminationStuff
{
    protected $table = 'examiantion_stuffs';    

    public function getViewResource(){
        return ViewMasterSurvey::class;
    }

    public function getShowResource(){
        return ShowMasterSurvey::class;
    }
}
