<?php

namespace Hanafalah\ModuleExamination\Schemas;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Hanafalah\ModuleExamination\Contracts\Data\AllergyStuffData;
use Hanafalah\ModuleExamination\Contracts\Schemas\AllergyStuff as ContractsAllergyStuff;

class AllergyStuff extends ExaminationStuff implements ContractsAllergyStuff
{
    protected string $__entity = 'AllergyStuff';
    public static $allergy_stuff_model;

    protected array $__cache = [
        'index' => [
            'name'     => 'allergy_stuff',
            'tags'     => ['allergy_stuff', 'allergy_stuff-index'],
            'forever'  => true
        ]
    ];

    public function prepareStoreAllergyStuff(AllergyStuffData $allergy_stuff_dto): Model{     
        $allergy_stuff = $this->prepareStoreUnicode($allergy_stuff_dto);       
        return static::$allergy_stuff_model = $allergy_stuff;
    }

    public function allergyStuff(mixed $conditionals = null): Builder{
        return $this->unicode($conditionals);
    }
}
