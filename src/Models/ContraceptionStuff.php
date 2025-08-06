<?php

namespace Hanafalah\ModuleExamination\Models;

use Hanafalah\ModuleExamination\Resources\ContraceptionStuff\{
    ViewContraceptionStuff, ShowContraceptionStuff
};

class ContraceptionStuff extends ExaminationStuff
{
    protected $table = 'examination_stuffs';

    public function getViewResource(){
        return ViewContraceptionStuff::class;
    }

    public function getShowResource(){
        return ShowContraceptionStuff::class;
    }
}
