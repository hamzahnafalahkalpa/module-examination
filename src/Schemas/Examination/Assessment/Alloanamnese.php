<?php

namespace Hanafalah\ModuleExamination\Schemas\Examination\Assessment;

use Hanafalah\ModuleExamination\Contracts\Schemas\Examination\Assessment\Alloanamnese as ContractsAlloanamnese;
use Illuminate\Database\Eloquent\Model;

class Alloanamnese extends Assessment implements ContractsAlloanamnese
{
    protected string $__entity   = 'Alloanamnese';
    public static $alloanamnese_model;

    public function prepareStore(mixed $attributes = null): Model
    {
        $attributes ??= request()->all();
        $attributes['is_alloanamnese'] ??= false;
        return parent::prepareStore($attributes);
    }
}
