<?php

namespace Hanafalah\ModuleExamination\Models\Examination\Assessment;

use Illuminate\Database\Eloquent\Model;

class Symptom extends Assessment {
    protected $table = 'assessments';
    public $response_model = 'array';
    public $specific = ['name'];

    public function getExamResults(?Model $model = null): array{
        $model ??= $this;
        return [
            'name' => $model->exam['name']
        ];
    }
}