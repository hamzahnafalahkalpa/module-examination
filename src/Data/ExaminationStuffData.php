<?php

namespace Hanafalah\ModuleExamination\Data;

use Hanafalah\LaravelSupport\Data\UnicodeData;
use Hanafalah\ModuleExamination\Contracts\Data\ExaminationStuffData as DataExaminationStuffData;

class ExaminationStuffData extends UnicodeData implements DataExaminationStuffData
{
    public static function before(array &$attributes){
        $attributes['flag'] ??= 'ExaminationStuff';
        parent::before($attributes);
    }
}
