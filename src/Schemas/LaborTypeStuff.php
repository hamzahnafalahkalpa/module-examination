<?php

namespace Hanafalah\ModuleExamination\Schemas;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Hanafalah\ModuleExamination\Contracts\Data\LaborTypeStuffData;
use Hanafalah\ModuleExamination\Contracts\Schemas\LaborTypeStuff as ContractsLaborTypeStuff;

class LaborTypeStuff extends ExaminationStuff implements ContractsLaborTypeStuff
{
    protected string $__entity = 'LaborTypeStuff';
    public $labor_type_stuff_model;

    protected array $__cache = [
        'index' => [
            'name'     => 'labor_type_stuff',
            'tags'     => ['labor_type_stuff', 'labor_type_stuff-index'],
            'forever'  => true
        ]
    ];

    public function prepareStoreLaborTypeStuff(LaborTypeStuffData $labor_type_stuff_dto): Model{     
        $labor_type_stuff = $this->prepareStoreExaminationStuff($labor_type_stuff_dto);       
        return $this->labor_type_stuff_model = $labor_type_stuff;
    }

    public function laborTypeStuff(mixed $conditionals = null): Builder{
        return $this->examinationStuff($conditionals);
    }
}
