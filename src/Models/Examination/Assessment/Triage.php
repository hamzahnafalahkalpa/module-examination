<?php

namespace Hanafalah\ModuleExamination\Models\Examination\Assessment;

use Illuminate\Database\Eloquent\Model;

class Triage extends Assessment {
    protected $table = 'assessments';
    public $specific = ['triage_id'];

    public function getExamResults(?Model $model = null): array{
        $model ??= $this;
        $triage = $this->ExaminationStuffModel()->find($model->exam['triage_id']);
        if (!isset($triage)) throw new \Exception('Triage not found',404);
        return [
            'triage_id'   => $model->triage_id,
            'result'      => $triage->result,
            'description' => $triage->description,
        ];
    }
}
