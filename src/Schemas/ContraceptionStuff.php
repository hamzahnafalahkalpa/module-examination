<?php

namespace Hanafalah\ModuleExamination\Schemas;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Hanafalah\ModuleExamination\Contracts\Data\ContraceptionStuffData;
use Hanafalah\ModuleExamination\Contracts\Schemas\ContraceptionStuff as ContractsContraceptionStuff;

class ContraceptionStuff extends ExaminationStuff implements ContractsContraceptionStuff
{
    protected string $__entity = 'ContraceptionStuff';
    public $contraception_stuff_model;

    protected array $__cache = [
        'index' => [
            'name'     => 'contraception_stuff',
            'tags'     => ['contraception_stuff', 'contraception_stuff-index'],
            'forever'  => true
        ]
    ];

    public function prepareStoreContraceptionStuff(ContraceptionStuffData $contraception_stuff_dto): Model{     
        $contraception_stuff = $this->prepareStoreExaminationStuff($contraception_stuff_dto);       
        return $this->contraception_stuff_model = $contraception_stuff;
    }

    public function contraceptionStuff(mixed $conditionals = null): Builder{
        return $this->examinationStuff($conditionals);
    }
}
