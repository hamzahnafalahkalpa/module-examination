<?php

namespace Hanafalah\ModuleExamination\Models;

use Hanafalah\ModuleExamination\Resources\MasterVaccine\{
    ViewMasterVaccine,
    ShowMasterVaccine
};
use Illuminate\Database\Eloquent\SoftDeletes;
use Hanafalah\LaravelHasProps\Concerns\HasProps;
use Hanafalah\LaravelSupport\Models\BaseModel;
use Illuminate\Database\Eloquent\Concerns\HasUlids;

class MasterVaccine extends BaseModel
{
    use SoftDeletes, HasProps, HasUlids;

    public $incrementing  = false;
    protected $keyType    = 'string';
    protected $primaryKey = 'id';
    protected $list       = ['id', 'name', 'update_able'];
    protected $show       = [];

    protected static function booted(): void
    {
        parent::booted();
        static::creating(function ($query) {
            if (!isset($query->update_able)) $query->update_able = true;
        });
    }

    public function getViewResource()
    {
        return ViewMasterVaccine::class;
    }

    public function getShowResource()
    {
        return ShowMasterVaccine::class;
    }
}
