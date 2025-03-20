<?php

namespace Gii\ModuleExamination\Schemas\Form;

use Gii\ModuleExamination\Contracts\Form as ContractsForm;
use Gii\ModuleExamination\Enums\Form\Flag;
use Gii\ModuleExamination\Resources\Form\ViewForm;
use Illuminate\Database\Eloquent\Collection;
use Zahzah\LaravelSupport\Supports\PackageManagement;

class Form extends PackageManagement implements ContractsForm{
    protected $list = ['id', 'parent_id', 'name', 'flag', 'morph', 'ordering', 'props'];

    protected array $__guard   = ['morph','flag'];
    protected array $__add     = ['parent_id','name','ordering'];
    protected string $__entity = 'Form';
    public static $form_model;

    protected array $__resources = [
        'view' => ViewForm::class
    ];

    public function prepareViewFormList(? array $attributes = null): Collection{
        $attributes ??= request()->all();

        return static::$form_model = $this->form()->get();
    }

    public function viewFormList(): array{
        return $this->transforming($this->__resources['view'],function(){
            return $this->prepareViewFormList();
        });
    }

    public function form(){
        $this->booting();
        return $this->FormModel()->where('flag',Flag::FORM->value)->withParameters()->orderBy('ordering','asc');
    }
}
