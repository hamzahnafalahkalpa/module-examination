<?php

namespace Hanafalah\ModuleExamination\Models;

use Hanafalah\ModuleExamination\Resources\ServiceLabel\{
    ViewServiceLabel, ShowServiceLabel
};

class ServiceLabel extends ExaminationStuff
{
    protected $table = 'examination_stuffs';

    public function getViewResource(){
        return ViewServiceLabel::class;
    }

    public function getShowResource(){
        return ShowServiceLabel::class;
    }
}
