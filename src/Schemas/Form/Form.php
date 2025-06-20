<?php

namespace Hanafalah\ModuleExamination\Schemas\Form;

use Hanafalah\ModuleExamination\Contracts\Schemas\Form as ContractsForm;
use Hanafalah\LaravelSupport\Supports\PackageManagement;

class Form extends PackageManagement implements ContractsForm
{
    protected string $__entity = 'Form';
    public static $form_model;
    protected mixed $__order_by_created_at = false; //asc, desc, false
}
