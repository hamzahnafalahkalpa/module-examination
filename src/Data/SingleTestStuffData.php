<?php

namespace Hanafalah\ModuleExamination\Data;

use Hanafalah\ModuleExamination\Contracts\Data\SingleTestStuffData as DataSingleTestStuffData;

class SingleTestStuffData extends ExaminationStuffData implements DataSingleTestStuffData
{
    public static function before(array &$attributes){
        $attributes['flag'] ??= 'SingleTestStuff';
        parent::before($attributes);
    }
}