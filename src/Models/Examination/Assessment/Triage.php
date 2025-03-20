<?php

namespace Gii\ModuleExamination\Models\Examination\Assessment;

class Triage extends Assessment {
    protected $table = 'assessments';
    public $specific = ['triage_id'];

    public function getExamResults($model): array{
        $triage = $this->ExaminationStuffModel()->find($model->triage_id);
        if (!isset($triage)) throw new \Exception('Triage not found',404);
        return [
            'triage_id'   => $model->triage_id,
            'result'      => $triage->result,
            'description' => $triage->description,
        ];
    }
}
