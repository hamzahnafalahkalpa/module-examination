<?php

namespace Hanafalah\ModuleExamination\Models;

use Hanafalah\ModuleExamination\Resources\HearingLossStuff\{
    ViewHearingLossStuff, ShowHearingLossStuff
};

class HearingLossStuff extends ExaminationStuff
{
    protected $table = 'examination_stuffs';

    public function getViewResource(){
        return ViewHearingLossStuff::class;
    }

    public function getShowResource(){
        return ShowHearingLossStuff::class;
    }
}
