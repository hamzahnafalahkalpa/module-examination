<?php

namespace Hanafalah\ModuleExamination\Models\Form;

use Hanafalah\ModuleExamination\Resources\Form\{ViewForm,ShowForm};
use Hanafalah\LaravelSupport\Models\Unicode\Unicode;

class Form extends Unicode{
    protected $table = 'unicodes';

    protected static function booted(): void{
        parent::booted();
        static::creating(function ($query) {
            $query->ordering ??= 1;
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

    public function showUsingRelation():array {
        $relation = ['childs','formHasSurvey'];
        if ($this->isUsingService()){
            $relation[] = 'service.servicePrices.tariffComponent';
        }
        return $relation;
    }

    public function masterFeature(){return $this->belongsToModel('MasterFeature');}
    public function screening(){return $this->belongsToMOdel('Screening', 'parent_id');}
    public function formHasAnatomies(){return $this->hasManyModel('FormHasAnatomy');}
    public function formHasSurvey(){return $this->hasOneModel('FormHasSurvey');}
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
