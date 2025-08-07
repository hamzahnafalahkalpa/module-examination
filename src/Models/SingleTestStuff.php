<?php

namespace Hanafalah\ModuleExamination\Models;

use Hanafalah\ModuleExamination\Resources\SingleTestStuff\{
    ViewSingleTestStuff, ShowSingleTestStuff
};

class SingleTestStuff extends ExaminationStuff
{
    protected $table = 'examination_stuffs';

    public function getViewResource(){
        return ViewSingleTestStuff::class;
    }

    public function getShowResource(){
        return ShowSingleTestStuff::class;
    }
}
