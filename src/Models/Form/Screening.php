<?php

namespace Hanafalah\ModuleExamination\Models\Form;

use Hanafalah\ModuleExamination\Resources\Screening\{
    ViewScreening, ShowScreening
};

class Screening extends Form
{    
    protected $table = 'unicodes';

    const FLAG_SCREENING = 'SCREENING';

    protected static function booted(): void
    {
        parent::booted();
        static::created(function ($query) {
            if (!isset($query->is_default)) $query->is_default = false;
            $query->save();
        });
    }

    public function showUsingRelation(): array{
        return ['screeningHasForms', 'hasServices'];
    }

    protected function isUsingService(): bool{
        return true;
    }

    public function getViewResource(){return ViewScreening::class;}
    public function getShowResource(){return ShowScreening::class;}

    public function masterFeature(){return $this->belongsTo('MasterFeature');}
    public function screeningHasForms(){return $this->hasManyModel('ScreeningHasForm','screening_id');}
    public function forms(){
        return $this->belongsToManyModel(
            'Form',
            'ScreeningHasForm',
            'screening_id',
            'form_id'
        )->orderBy($this->ScreeningHasFormModel()->getTable() . '.props->ordering', 'asc')
            ->orderBy('name', 'asc');
    }
}
