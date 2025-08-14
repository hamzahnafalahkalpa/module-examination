<?php

namespace Hanafalah\ModuleExamination\Data;

use Hanafalah\ModuleExamination\Contracts\Data\HearingLossStuffData as DataHearingLossStuffData;

class HearingLossStuffData extends ExaminationStuffData implements DataHearingLossStuffData
{
    public static function before(array &$attributes){
        $attributes['flag'] ??= 'HearingLossStuff';
        parent::before($attributes);
    }
}