<?php

namespace Hanafalah\ModuleExamination\Models;

use Hanafalah\ModuleExamination\Resources\BirthHelperStuff\{
    ViewBirthHelperStuff, ShowBirthHelperStuff
};

class BirthHelperStuff extends ExaminationStuff
{
    protected $table = 'examination_stuffs';

    public function getViewResource(){
        return ViewBirthHelperStuff::class;
    }

    public function getShowResource(){
        return ShowBirthHelperStuff::class;
    }
}
