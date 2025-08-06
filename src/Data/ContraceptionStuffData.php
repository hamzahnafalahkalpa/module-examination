<?php

namespace Hanafalah\ModuleExamination\Data;

use Hanafalah\ModuleExamination\Contracts\Data\ContraceptionStuffData as DataContraceptionStuffData;

class ContraceptionStuffData extends ExaminationStuffData implements DataContraceptionStuffData
{
    public static function before(array &$attributes){
        $attributes['flag'] ??= 'ContraceptionStuff';
        parent::before($attributes);
    }
}