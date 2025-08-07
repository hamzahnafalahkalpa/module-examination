<?php

namespace Hanafalah\ModuleExamination\Schemas;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Hanafalah\ModuleExamination\Contracts\Data\SingleTestStuffData;
use Hanafalah\ModuleExamination\Contracts\Schemas\SingleTestStuff as ContractsSingleTestStuff;

class SingleTestStuff extends ExaminationStuff implements ContractsSingleTestStuff
{
    protected string $__entity = 'SingleTestStuff';
    public $single_test_stuff_model;

    protected array $__cache = [
        'index' => [
            'name'     => 'single_test_stuff',
            'tags'     => ['single_test_stuff', 'single_test_stuff-index'],
            'forever'  => true
        ]
    ];

    public function prepareStoreSingleTestStuff(SingleTestStuffData $single_test_stuff_dto): Model{     
        $single_test_stuff = $this->prepareStoreExaminationStuff($single_test_stuff_dto);       
        return $this->single_test_stuff_model = $single_test_stuff;
    }

    public function singleTestStuff(mixed $conditionals = null): Builder{
        return $this->examinationStuff($conditionals);
    }
}
