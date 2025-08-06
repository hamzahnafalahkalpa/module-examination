<?php

namespace Hanafalah\ModuleExamination\Models;

use Hanafalah\ModuleExamination\Resources\ImmunizationStuff\{
    ViewImmunizationStuff, ShowImmunizationStuff
};

class ImmunizationStuff extends ExaminationStuff
{
    protected $table = 'examination_stuffs';

    public function getViewResource(){
        return ViewImmunizationStuff::class;
    }

    public function getShowResource(){
        return ShowImmunizationStuff::class;
    }
}
