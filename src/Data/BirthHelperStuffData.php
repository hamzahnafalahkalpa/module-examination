<?php

namespace Hanafalah\ModuleExamination\Data;

use Hanafalah\ModuleExamination\Contracts\Data\BirthHelperStuffData as DataBirthHelperStuffData;

class BirthHelperStuffData extends ExaminationStuffData implements DataBirthHelperStuffData
{
    public static function before(array &$attributes){
        $attributes['flag'] ??= 'BirthHelperStuff';
        parent::before($attributes);
    }
}