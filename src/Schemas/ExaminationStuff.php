<?php

namespace Hanafalah\ModuleExamination\Schemas;

use Hanafalah\LaravelSupport\Schemas\Unicode;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Hanafalah\ModuleExamination\Contracts\Data\ExaminationStuffData;
use Hanafalah\ModuleExamination\Contracts\Schemas\ExaminationStuff as ContractsExaminationStuff;

class ExaminationStuff extends Unicode implements ContractsExaminationStuff
{
    protected string $__entity = 'ExaminationStuff';
    public $examination_stuff_model;

    protected array $__cache = [
        'index' => [
            'name'     => 'examination_stuff',
            'tags'     => ['examination_stuff', 'examination_stuff-index'],
            'duration' => 24*7
        ]
    ];

    public function prepareStoreExaminationStuff(ExaminationStuffData $examination_stuff_dto): Model{     
        $examination_stuff = $this->prepareStoreUnicode($examination_stuff_dto);       
        return $this->examination_stuff_model = $examination_stuff;
    }

    public function examinationStuff(mixed $conditionals = null): Builder{
        return $this->unicode($conditionals);
    }
}
