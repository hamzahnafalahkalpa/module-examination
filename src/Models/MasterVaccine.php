<?php

namespace Gii\ModuleExamination\Models;

use Gii\ModuleExamination\Resources\MasterVaccine\{
    ViewMasterVaccine, ShowMasterVaccine
};
use Illuminate\Database\Eloquent\SoftDeletes;
use Zahzah\LaravelHasProps\Concerns\HasProps;
use Zahzah\LaravelSupport\Models\BaseModel;

class MasterVaccine extends BaseModel {
    use SoftDeletes, HasProps;

    protected $list       = ['id','name','update_able'];
    protected $show       = [];

    protected static function booted(): void{
        parent::booted();
        static::creating(function($query){
            if (!isset($query->update_able)) $query->update_able = true;
        });
    }

    public function toViewApi(){
        return new ViewMasterVaccine($this);
    }

    public function toShowApi(){
        return new ShowMasterVaccine($this);
    }
}
