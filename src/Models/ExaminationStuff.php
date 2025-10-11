<?php

namespace Hanafalah\ModuleExamination\Models;

use Hanafalah\ModuleExamination\Resources\ExaminationStuff\ViewExaminationStuff;
use Hanafalah\LaravelSupport\Models\Unicode\Unicode;

class ExaminationStuff extends Unicode
{
    protected $table = 'examination_stuffs';

    public function getViewResource(){return ViewExaminationStuff::class;}
    public function getShowResource(){return ViewExaminationStuff::class;}
}
