<?php

namespace Hanafalah\ModuleExamination\Schemas\Form;

use Hanafalah\LaravelSupport\Supports\PackageManagement;
use Hanafalah\ModuleExamination\Contracts\Schemas\Form\Form as FormForm;

class Form extends PackageManagement implements FormForm
{
    protected string $__entity = 'Form';
    public static $form_model;
    protected mixed $__order_by_created_at = false; //asc, desc, false
}
