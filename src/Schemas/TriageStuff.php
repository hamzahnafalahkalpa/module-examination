<?php

namespace Hanafalah\ModuleExamination\Schemas;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Hanafalah\ModuleExamination\Contracts\Data\TriageStuffData;
use Hanafalah\ModuleExamination\Contracts\Schemas\TriageStuff as ContractsTriageStuff;

class TriageStuff extends ExaminationStuff implements ContractsTriageStuff
{
    protected string $__entity = 'TriageStuff';
    public $triage_stuff_model;

    protected array $__cache = [
        'index' => [
            'name'     => 'triage_stuff',
            'tags'     => ['triage_stuff', 'triage_stuff-index'],
            'forever'  => true
        ]
    ];

    public function prepareStoreTriageStuff(TriageStuffData $triage_stuff_dto): Model{     
        $triage_stuff = $this->prepareStoreUnicode($triage_stuff_dto);       
        return $this->triage_stuff_model = $triage_stuff;
    }

    public function triageStuff(mixed $conditionals = null): Builder{
        return $this->examinationStuff($conditionals);
    }
}
