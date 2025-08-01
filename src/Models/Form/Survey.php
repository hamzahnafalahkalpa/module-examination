<?php

namespace Hanafalah\ModuleExamination\Models\Form;

use Hanafalah\ModuleExamination\Enums\Form\Status;

class Survey extends Form
{
    protected $table = 'unicodes';

    protected static function booted(): void{
        parent::booted();
        static::creating(function ($query) {
            parent::creating($query);
            $query->status ??= Status::ACTIVE->value;
        });
    }
}
