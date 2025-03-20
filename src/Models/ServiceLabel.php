<?php

namespace Gii\ModuleExamination\Models;

class ServiceLabel extends ExaminationStuff {
    protected $table = 'examination_stuffs';

    protected static function booted(): void{
        parent::booted();
        static::addGlobalScope('service-label',function($query){
            $query->where('flag','ServiceLabel');
        });
    }
}