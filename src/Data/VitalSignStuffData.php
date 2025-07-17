<?php

namespace Hanafalah\ModuleExamination\Data;

use Hanafalah\ModuleExamination\Contracts\Data\VitalSignStuffData as DataVitalSignStuffData;

class VitalSignStuffData extends ExaminationStuffData implements DataVitalSignStuffData
{
    public static function before(array &$attributes){
        $attributes['flag'] ??= 'VitalSignStuff';
        parent::before($attributes);
    }
}