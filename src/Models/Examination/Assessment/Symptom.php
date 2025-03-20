<?php

namespace Gii\ModuleExamination\Models\Examination\Assessment;

class Symptom extends Assessment {
    protected $table = 'assessments';
    public $response_model   = 'array';
    public $specific = ['name'];

    public function getExamResults($model): array{
        return [
            'name' => $model->name
        ];
    }
}