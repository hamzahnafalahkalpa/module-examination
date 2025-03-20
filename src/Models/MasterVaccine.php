<?php

namespace Hanafalah\ModuleExamination\Models;

use Hanafalah\ModuleExamination\Resources\MasterVaccine\{
    ViewMasterVaccine,
    ShowMasterVaccine
};
use Illuminate\Database\Eloquent\SoftDeletes;
use Hanafalah\LaravelHasProps\Concerns\HasProps;
use Hanafalah\LaravelSupport\Models\BaseModel;

class MasterVaccine extends BaseModel
{
    use SoftDeletes, HasProps;

    protected $list       = ['id', 'name', 'update_able'];
    protected $show       = [];

    protected static function booted(): void
    {
        parent::booted();
        static::creating(function ($query) {
            if (!isset($query->update_able)) $query->update_able = true;
        });
    }

    public function toViewApi()
    {
        return new ViewMasterVaccine($this);
    }

    public function toShowApi()
    {
        return new ShowMasterVaccine($this);
    }
}
