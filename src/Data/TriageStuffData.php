<?php

namespace Hanafalah\ModuleExamination\Data;

use Hanafalah\ModuleExamination\Contracts\Data\TriageStuffData as DataTriageStuffData;

class TriageStuffData extends ExaminationStuffData implements DataTriageStuffData
{
    public static function before(array &$attributes){
        $attributes['flag'] ??= 'TriageStuff';
        parent::before($attributes);
    }
}