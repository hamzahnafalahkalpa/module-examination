<?php

namespace Hanafalah\ModuleExamination\Models\Form;

use Hanafalah\ModuleExamination\Enums\Form\Flag;
use Hanafalah\ModuleExamination\Resources\Form\{ViewForm,ShowForm};
use Hanafalah\LaravelSupport\Models\Unicode\Unicode;

class Form extends Unicode{
    protected $table = 'unicodes';

    protected static function booted(): void{
        parent::booted();
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
    public function getShowResource(){return ShowForm::class;}

    public function getForeignKey(){
        return 'form_id';
    }

    public function masterFeature(){return $this->belongsToModel('MasterFeature');}
    public function screening(){return $this->belongsToMOdel('Screening', 'parent_id');}
    public function formHasAnatomies(){return $this->hasManyModel('FormHasAnatomy');}
    public function anatomies(){
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
