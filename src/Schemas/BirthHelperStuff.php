<?php

namespace Hanafalah\ModuleExamination\Schemas;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Hanafalah\ModuleExamination\Contracts\Data\BirthHelperStuffData;
use Hanafalah\ModuleExamination\Contracts\Schemas\BirthHelperStuff as ContractsBirthHelperStuff;

class BirthHelperStuff extends ExaminationStuff implements ContractsBirthHelperStuff
{
    protected string $__entity = 'BirthHelperStuff';
    public $birth_helper_stuff_model;

    protected array $__cache = [
        'index' => [
            'name'     => 'birth_helper_stuff',
            'tags'     => ['birth_helper_stuff', 'birth_helper_stuff-index'],
            'forever'  => true
        ]
    ];

    public function prepareStoreBirthHelperStuff(BirthHelperStuffData $birth_helper_stuff_dto): Model{     
        $birth_helper_stuff = $this->prepareStoreExaminationStuff($birth_helper_stuff_dto);       
        return $this->birth_helper_stuff_model = $birth_helper_stuff;
    }

    public function birthHelperStuff(mixed $conditionals = null): Builder{
        return $this->examinationStuff($conditionals);
    }
}
