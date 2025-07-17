<?php

namespace Hanafalah\ModuleExamination\Models;

use Hanafalah\ModuleExamination\Resources\AllergyStuff\{
    ViewAllergyStuff, ShowAllergyStuff
};

class AllergyStuff extends ExaminationStuff
{
    protected $table = 'examination_stuffs';

    public function getViewResource(){
        return ViewAllergyStuff::class;
    }

    public function getShowResource(){
        return ShowAllergyStuff::class;
    }
}
