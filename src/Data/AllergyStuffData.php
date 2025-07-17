<?php

namespace Hanafalah\ModuleExamination\Data;

use Hanafalah\ModuleExamination\Contracts\Data\AllergyStuffData as DataAllergyStuffData;

class AllergyStuffData extends ExaminationStuffData implements DataAllergyStuffData
{
    public static function before(array &$attributes){
        $attributes['flag'] ??= 'AllergyStuff';
        parent::before($attributes);
    }
}