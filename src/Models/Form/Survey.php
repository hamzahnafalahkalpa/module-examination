<?php

namespace Hanafalah\ModuleExamination\Models\Form;

use Hanafalah\ModuleExamination\Enums\Form\Flag;
use Hanafalah\ModuleExamination\Enums\Form\Status;

class Survey extends Form
{
    protected $table = 'forms';

    protected static function booted(): void
    {
        parent::booted();
        static::addGlobalScope('survey', function ($query) {
            $query->survey();
        });

        static::creating(function ($query) {
            parent::creating($query);
            if (!isset($query->status)) $query->status = Status::ACTIVE->value;
            if (!isset($query->flag))   $query->flag   = Flag::SURVEY->value;
        });
    }

    public function scopeSurvey($builder)
    {
        return $builder->where('flag', Flag::SURVEY->value)->withoutGlobalScope('form');
    }
}
