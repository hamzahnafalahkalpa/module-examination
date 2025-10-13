<?php

namespace Hanafalah\ModuleExamination\Data\Form;

use Hanafalah\ModuleExamination\Contracts\Data\Form\SoapData as DataSoapData;

class SoapData extends ScreeningData implements DataSoapData
{
    public static function before(array &$attributes){
        $attributes['flag'] ??= 'Soap';
        parent::before($attributes);
    }
}
