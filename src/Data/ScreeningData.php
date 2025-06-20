<?php

namespace Hanafalah\ModuleExamiantion\Data;

use Hanafalah\ModuleExamination\Contracts\Data\ScreeningData as DataScreeningData;

class ScreeningData extends FormData implements DataScreeningData
{
    public static function before(array &$attributes){
        $attributes['flag'] = 'Screening';
    }
}
