<?php

namespace Hanafalah\ModuleExamination\Data\Form;

use Hanafalah\ModuleExamination\Contracts\Data\Form\ScreeningData as DataScreeningData;

class ScreeningData extends FormData implements DataScreeningData
{
    public static function before(array &$attributes){
        $attributes['flag'] = 'Screening';
    }
}
