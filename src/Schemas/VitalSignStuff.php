<?php

namespace Hanafalah\ModuleExamination\Schemas;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Hanafalah\ModuleExamination\Contracts\Data\VitalSignStuffData;
use Hanafalah\ModuleExamination\Contracts\Schemas\VitalSignStuff as ContractsVitalSignStuff;

class VitalSignStuff extends ExaminationStuff implements ContractsVitalSignStuff
{
    protected string $__entity = 'VitalSignStuff';
    public $vital_sign_stuff_model;

    protected array $__cache = [
        'index' => [
            'name'     => 'vital_sign_stuff',
            'tags'     => ['vital_sign_stuff', 'vital_sign_stuff-index'],
            'forever'  => true
        ]
    ];

    public function prepareStoreVitalSignStuff(VitalSignStuffData $vital_sign_stuff_dto): Model{     
        $vital_sign_stuff = $this->prepareStoreUnicode($vital_sign_stuff_dto);       
        return $this->vital_sign_stuff_model = $vital_sign_stuff;
    }

    public function vitalSignStuff(mixed $conditionals = null): Builder{
        return $this->examinationStuff($conditionals);
    }
}
