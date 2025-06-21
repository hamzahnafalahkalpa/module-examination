<?php

namespace Hanafalah\ModuleExamination\Models;

use Hanafalah\ModuleExamination\Resources\GcsStuff\{
    ViewGcsStuff, ShowGcsStuff
};

class GcsStuff extends ExaminationStuff
{
    protected $table = 'examination_stuffs';

    public function getViewResource(){
        return ViewGcsStuff::class;
    }

    public function getShowResource(){
        return ShowGcsStuff::class;
    }
}
