<?php

namespace Gii\ModuleExamination\Models\Examination\Assessment\Diagnose;

class HistoryIllness extends Diagnose {
    protected $table = 'assessments';

    public $response_model   = 'array';

    public $specific = [
        'name','disease_type','disease_id','classification_disease_id',
        'since_type', 'since'
    ];

    public function getExamResults($model): array{
        return [
            'name'                => $model->name,
            'disease_type'        => $model->disease_type,
            'disease_id'          => $model->disease_id,
            'classification_disease_id'   => $model->classification_disease_id ?? null,
            'since_type'          => $model->since_type ?? null,
            'since'               => $model->since ?? []
        ];
    }
}