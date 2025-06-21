<?php

namespace Hanafalah\ModuleExamination\Models;

use Hanafalah\ModuleExamination\Resources\TriageStuff\{
    ViewTriageStuff, ShowTriageStuff
};

class TriageStuff extends ExaminationStuff
{
    protected $table = 'examination_stuffs';

    public function getViewResource(){
        return ViewTriageStuff::class;
    }

    public function getShowResource(){
        return ShowTriageStuff::class;
    }
}
