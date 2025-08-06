<?php

namespace Hanafalah\ModuleExamination\Schemas;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Hanafalah\ModuleExamination\Contracts\Data\ImmunizationStuffData;
use Hanafalah\ModuleExamination\Contracts\Schemas\ImmunizationStuff as ContractsImmunizationStuff;

class ImmunizationStuff extends ExaminationStuff implements ContractsImmunizationStuff
{
    protected string $__entity = 'ImmunizationStuff';
    public $immunization_stuff_model;

    protected array $__cache = [
        'index' => [
            'name'     => 'immunization_stuff',
            'tags'     => ['immunization_stuff', 'immunization_stuff-index'],
            'forever'  => true
        ]
    ];

    public function prepareStoreImmunizationStuff(ImmunizationStuffData $immunization_stuff_dto): Model{     
        $immunization_stuff = $this->prepareStoreExaminationStuff($immunization_stuff_dto);       
        return $this->immunization_stuff_model = $immunization_stuff;
    }

    public function immunizationStuff(mixed $conditionals = null): Builder{
        return $this->examinationStuff($conditionals);
    }
}
