<?php

namespace Hanafalah\ModuleExamination\Schemas\Form;

use Hanafalah\ModuleExamination\Contracts\Data\Form\SoapData;
use Hanafalah\ModuleExamination\Contracts\Schemas\Form\Soap as FormSoap;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Soap extends Screening implements FormSoap
{
    protected string $__entity = 'Soap';
    public $soap_model;
    protected mixed $__order_by_created_at = false; //asc, desc, false

    public function prepareStoreSoap(SoapData $soap_dto): Model{
        $soap = $this->prepareStoreScreening($soap_dto);
        return $soap;
    }

    public function soap(mixed $conditionals = null): Builder{
        return $this->screening($conditionals);        
    }
}
