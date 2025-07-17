<?php

namespace Hanafalah\ModuleExamination\Models;

use Hanafalah\ModuleExamination\Resources\VitalSignStuff\{
    ViewVitalSignStuff, ShowVitalSignStuff
};

class VitalSignStuff extends ExaminationStuff
{
    protected $table = 'examination_stuffs';

    public function getViewResource(){
        return ViewVitalSignStuff::class;
    }

    public function getShowResource(){
        return ShowVitalSignStuff::class;
    }
}
