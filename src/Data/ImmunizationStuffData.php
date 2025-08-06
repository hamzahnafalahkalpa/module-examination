<?php

namespace Hanafalah\ModuleExamination\Data;

use Hanafalah\ModuleExamination\Contracts\Data\ImmunizationStuffData as DataImmunizationStuffData;

class ImmunizationStuffData extends ExaminationStuffData implements DataImmunizationStuffData
{
    public static function before(array &$attributes){
        $attributes['flag'] ??= 'ImmunizationStuff';
        parent::before($attributes);
    }
}