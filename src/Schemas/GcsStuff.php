<?php

namespace Hanafalah\ModuleExamination\Schemas;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Hanafalah\ModuleExamination\Contracts\Data\GcsStuffData;
use Hanafalah\ModuleExamination\Contracts\Schemas\GcsStuff as ContractsGcsStuff;

class GcsStuff extends ExaminationStuff implements ContractsGcsStuff
{
    protected string $__entity = 'GcsStuff';
    public $gcs_stuff_model;

    protected array $__cache = [
        'index' => [
            'name'     => 'gcs_stuff',
            'tags'     => ['gcs_stuff', 'gcs_stuff-index'],
            'forever'  => true
        ]
    ];

    public function prepareStoreGcsStuff(GcsStuffData $gcs_stuff_dto): Model{     
        $gcs_stuff = $this->prepareStoreUnicode($gcs_stuff_dto);       
        return $this->gcs_stuff_model = $gcs_stuff;
    }

    public function gcsStuff(mixed $conditionals = null): Builder{
        return $this->unicode($conditionals);
    }
}
