<?php

namespace Hanafalah\ModuleExamination\Models;

use Hanafalah\ModuleExamination\Resources\LaborTypeStuff\{
    ViewLaborTypeStuff, ShowLaborTypeStuff
};

class LaborTypeStuff extends ExaminationStuff
{
    protected $table = 'examination_stuffs';

    public function getViewResource(){
        return ViewLaborTypeStuff::class;
    }

    public function getShowResource(){
        return ShowLaborTypeStuff::class;
    }
}
