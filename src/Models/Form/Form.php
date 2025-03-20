<?php

namespace Gii\ModuleExamination\Models\Form;

use Gii\ModuleExamination\Enums\Form\Flag;
use Gii\ModuleExamination\Resources\Form\ViewForm;
use Zahzah\LaravelHasProps\Concerns\HasProps;
use Zahzah\LaravelSupport\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Gii\ModuleExamination\Concerns\HasSurveyItem;

class Form extends BaseModel{
    use HasProps, SoftDeletes, HasSurveyItem;

    protected $list = ['id', 'parent_id', 'name', 'flag', 'morph', 'ordering', 'master_feature_id', 'props'];
    protected $show = [];

    protected $casts = [
        'name' => 'string'
    ];

    protected static function booted(): void{
        parent::booted();
        static::creating(function($query){
            if (!isset($query->ordering)) $query->ordering = 1;
            if (!isset($query->flag))     $query->flag     = Flag::FORM->value;
        });
        static::created(function($query){
            $query->setAttribute('personalize',[
                'grid_cols' => 1,
                'grid_rows' => 1
            ]);
            $query->save();
        });
    }

    public function toViewApi(){
        return new ViewForm($this);
    }

    public function toShowApi(){
        return new ViewForm($this);
    }

    public function scopeForm($builder) {return $builder->where('flag',Flag::FORM->value);}
    public function scopeAsEMR($builder){return $builder->withoutGlobalScope(SoftDeletingScope::class);}
    public function masterFeature(){return $this->belongsToModel('MasterFeature');}
    public function screening(){return $this->belongsToMOdel('Screening', 'parent_id');}
    public function formHasAnatomies(){return $this->hasManyModel('FormHasAnatomy');}
    public function anatomies(){
        return $this->belongsToManyModel(
            'Anatomy', 'FormHasAnatomy',
            $this->getForeignKey(), 
            $this->AnatomyModel()->getForeignKey()
        )->select([
            $this->AnatomyModel()->getTable() . '.*',
            $this->FormHasAnatomyModel()->getTable().'.props as pivotProps'
        ]);
    }
}