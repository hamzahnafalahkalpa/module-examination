<?php

namespace Hanafalah\ModuleExamination\Models\Examination\Assessment\Diagnose;

use Illuminate\Database\Eloquent\Model;

class HistoryIllness extends Diagnose
{
    protected $table = 'assessments';
    public $response_model   = 'array';
    public $specific = [
        'name',
        'disease_type',
        'disease_id',
        'classification_disease_id',
        'since_type',
        'since'
    ];

    public function getExamResults(?Model $model = null): array
    {
        $model ??= $this;
        $exam = $model->exam;
        return [
            'name'                => $exam['name'],
            'disease_type'        => $exam['disease_type'],
            'disease_id'          => $exam['disease_id'],
            'classification_disease_id'   => $exam['classification_disease_id'] ?? null,
            'since_type'          => $exam['since_type'] ?? null,
            'since'               => $exam['since'] ?? []
        ];
    }
}
