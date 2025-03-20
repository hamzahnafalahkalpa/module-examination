<?php

namespace Gii\ModuleExamination\Models\Form;

use Gii\ModuleExamination\Enums\Form\Flag;
use Gii\ModuleExamination\Enums\Form\Status;
use Gii\ModuleService\Concerns\HasService;

class Screening extends Form{
    use HasService;

    protected $table = 'forms';

    const IS_DEFAULT = true;
    const IS_NON_DEFAULT = false;

    protected static function booted(): void{
        parent::booted();
        static::addGlobalScope('screening',function($query){
            $query->screening();
        });

        static::creating(function($query){
            if (!isset($query->status)) $query->status = Status::ACTIVE->value;
            $query->morph  = '';
            $query->flag   = Flag::SCREENING->value;
        });

        static::created(function($query){
            if (!isset($query->is_default)) $query->is_default = false;
            $query->save();
        });
    }

    public function scopeScreening($builder) {return $builder->where('flag',Flag::SCREENING->value)->withoutGlobalScope('form');}
    public function masterFeature(){return $this->belongsTo('MasterFeature');}
    public function forms(){
        return $this->belongsToManyModel(
            'Form',
            'ScreeningHasForm',
            'screening_id',
            'form_id'
        )->orderBy($this->ScreeningHasFormModel()->getTable().'.props->ordering','asc')
        ->orderBy('name','asc');
    }
}
