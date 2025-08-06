<?php

namespace Hanafalah\ModuleExamination\Data;

use Hanafalah\ModuleExamination\Contracts\Data\LaborTypeStuffData as DataLaborTypeStuffData;

class LaborTypeStuffData extends ExaminationStuffData implements DataLaborTypeStuffData
{
    public static function before(array &$attributes){
        $attributes['flag'] ??= 'LaborTypeStuff';
        parent::before($attributes);
    }
}