<?php

namespace Hanafalah\ModuleExamination\Schemas;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Hanafalah\ModuleExamination\Contracts\Data\HearingLossStuffData;
use Hanafalah\ModuleExamination\Contracts\Schemas\HearingLossStuff as ContractsHearingLossStuff;

class HearingLossStuff extends ExaminationStuff implements ContractsHearingLossStuff
{
    protected string $__entity = 'HearingLossStuff';
    public $hearing_loss_stuff_model;

    protected array $__cache = [
        'index' => [
            'name'     => 'hearing_loss_stuff',
            'tags'     => ['hearing_loss_stuff', 'hearing_loss_stuff-index'],
            'forever'  => true
        ]
    ];

    public function prepareStoreHearingLossStuff(HearingLossStuffData $hearing_loss_stuff_dto): Model{     
        $hearing_loss_stuff = $this->prepareStoreExaminationStuff($hearing_loss_stuff_dto);       
        return $this->hearing_loss_stuff_model = $hearing_loss_stuff;
    }

    public function hearingLossStuff(mixed $conditionals = null): Builder{
        return $this->examinationStuff($conditionals);
    }
}
