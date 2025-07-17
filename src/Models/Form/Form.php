<?php

namespace Hanafalah\ModuleExamination\Models\Form;

use Hanafalah\ModuleExamination\Enums\Form\Flag;
use Hanafalah\ModuleExamination\Resources\Form\ViewForm;
use Hanafalah\LaravelHasProps\Concerns\HasProps;
use Hanafalah\LaravelSupport\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Hanafalah\ModuleExamination\Concerns\HasSurveyItem;
use Illuminate\Database\Eloquent\Concerns\HasUlids;

class Form extends BaseModel
{
    use HasUlids, HasProps, SoftDeletes, HasSurveyItem;

    public $incrementing = false;
    protected $keyType = 'string';
    protected $primaryKey = 'id';
    protected $list = [
        'id', 'parent_id', 'name', 'flag', 'label', 
        'morph', 'ordering', 'master_feature_id', 'props'
    ];
    protected $show = [];

    protected $casts = [
        'name' => 'string'
    ];

    protected static function booted(): void
    {
        parent::booted();
        static::addGlobalScope('flag',function($query){
            $query->flagIn('FORM');
        });
        static::creating(function ($query) {
            if (!isset($query->ordering)) $query->ordering = 1;
            if (!isset($query->flag))     $query->flag     = Flag::FORM->value;
        });
        static::created(function ($query) {
            $query->setAttribute('personalize', [
                'grid_cols' => 1,
                'grid_rows' => 1
            ]);
            $query->save();
        });
    }

    public function getViewResource(){return ViewForm::class;}
    public function getShowResource(){return ViewForm::class;}
    public function scopeForm($builder){return $builder->where('flag', Flag::FORM->value);}
    public function scopeAsEMR($builder){return $builder->withoutGlobalScope(SoftDeletingScope::class);}
    public function masterFeature(){return $this->belongsToModel('MasterFeature');}
    public function screening(){return $this->belongsToMOdel('Screening', 'parent_id');}
    public function formHasAnatomies(){return $this->hasManyModel('FormHasAnatomy');}
    public function anatomies()
    {
        return $this->belongsToManyModel(
            'Anatomy',
            'FormHasAnatomy',
            $this->getForeignKey(),
            $this->AnatomyModel()->getForeignKey()
        )->select([
            $this->AnatomyModel()->getTable() . '.*',
            $this->FormHasAnatomyModel()->getTable() . '.props as pivotProps'
        ]);
    }
}
