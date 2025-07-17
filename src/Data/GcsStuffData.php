<?php

namespace Hanafalah\ModuleExamination\Data;

use Hanafalah\ModuleExamination\Contracts\Data\GcsStuffData as DataGcsStuffData;

class GcsStuffData extends ExaminationStuffData implements DataGcsStuffData
{
    public static function before(array &$attributes){
        $attributes['flag'] = 'GcsStuff';
        parent::before($attributes);
    }
}