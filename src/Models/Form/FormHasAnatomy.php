<?php

namespace Hanafalah\ModuleExamination\Models\Form;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Hanafalah\LaravelHasProps\Concerns\HasProps;
use Hanafalah\LaravelSupport\Models\BaseModel;

class FormHasAnatomy extends BaseModel
{
    use HasUlids, HasProps;

    public $incrementing  = false;
    public $timestamps    = false;
    protected $primaryKey = 'id';
    protected $keyType    = 'string';
    protected $list       = ['id', 'anatomy_id', 'form_id', 'props'];
    protected $show       = [];

    public function anatomy()
    {
        return $this->belongsToModel('Anatomy');
    }
    public function form()
    {
        return $this->belongsToModel('Form');
    }
}
