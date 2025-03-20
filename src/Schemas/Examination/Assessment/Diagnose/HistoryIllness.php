<?php

namespace Hanafalah\ModuleExamination\Schemas\Examination\Assessment\Diagnose;

use Hanafalah\ModuleExamination\Contracts\Examination\Assessment\Diagnose\HistoryIllness as ContractsHistoryIllness;
use Illuminate\Database\Eloquent\Builder;

class HistoryIllness extends Diagnose implements ContractsHistoryIllness
{
    protected string $__entity   = 'HistoryIllness';
    public function diagnose(): Builder
    {
        $this->booting();
        return $this->HistoryIllnessModel()->withParameters('or')->orderBy('props->name', 'asc');
    }
}
