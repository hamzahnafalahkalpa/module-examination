<?php

namespace Hanafalah\ModuleExamination\Data;

use Hanafalah\ModuleExamination\Contracts\Data\ServiceLabelData as DataServiceLabelData;

class ServiceLabelData extends ExaminationStuffData implements DataServiceLabelData
{
    public static function before(array &$attributes){
        $attributes['flag'] ??= 'ServiceLabel';
        parent::before($attributes);
    }
}