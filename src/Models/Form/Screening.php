<?php

namespace Hanafalah\ModuleExamination\Models\Form;

use Hanafalah\ModuleExamination\Enums\Form\Status;
use Hanafalah\ModuleExamination\Resources\Screening\ViewScreening;
use Hanafalah\ModuleService\Concerns\HasService;

class Screening extends Form
{
    use HasService;

    protected $table = 'forms';

    const FLAG_SCREENING = 'SCREENING';
    const IS_DEFAULT = true;
    const IS_NON_DEFAULT = false;

    protected static function booted(): void
    {
        parent::booted();
        static::addGlobalScope('flag', function ($query) {
            $query->flagIn(self::FLAG_SCREENING);
        });

        static::creating(function ($query) {
            if (!isset($query->status)) $query->status = Status::ACTIVE->value;
            $query->morph  = '';
            $query->flag   = self::FLAG_SCREENING;
        });

        static::created(function ($query) {
            if (!isset($query->is_default)) $query->is_default = false;
            $query->save();
        });
    }

    public function viewUsingRelation(): array{
        return [];
    }

    public function showUsingRelation(): array{
        return ['forms', 'hasServices'];
    }

    public function getViewResource(){return ViewScreening::class;}
    public function showViewResource(){return ViewScreening::class;}

    public function masterFeature(){return $this->belongsTo('MasterFeature');}
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
