<?php

namespace Hanafalah\ModuleExamination\Schemas\Form;

use Hanafalah\LaravelSupport\Schemas\Unicode;
use Hanafalah\ModuleExamination\Contracts\Data\Form\FormData;
use Hanafalah\ModuleExamination\Contracts\Schemas\Form\Form as FormForm;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Form extends Unicode implements FormForm
{
    protected string $__entity = 'Form';
    public $form_model;
    protected mixed $__order_by_created_at = false; //asc, desc, false

    public function prepareStoreForm(FormData $form_dto): Model{
        $form = $this->prepareStoreUnicode($form_dto);
        $this->fillingProps($form,$form_dto->props);
        $form->save();
        return $this->form_model = $form;
    }

    public function form(mixed $conditionals = null): Builder{
        return $this->unicode($conditionals);
    }
}
