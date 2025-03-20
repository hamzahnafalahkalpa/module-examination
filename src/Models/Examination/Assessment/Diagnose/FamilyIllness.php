<?php

namespace Hanafalah\ModuleExamination\Models\Examination\Assessment\Diagnose;

class FamilyIllness extends Diagnose
{
    protected $table = 'assessments';

    public $response_model   = 'array';
    public $specific = [
        'name',
        'disease_type',
        'disease_id',
        'classification_disease_id',
        'family_role_id',
        'family_patient_id',
        'family_name',
        'child_position'
    ];

    public function getExamResults($model): array
    {
        $family_role = $this->ExaminationStuffModel()->find($model->family_role_id);
        return [
            'name'                      => $model->name,
            'disease_type'              => $model->disease_type,
            'disease_id'                => $model->disease_id,
            'classification_disease_id' => $model->classification_disease_id ?? null,
            'family_role_id'            => $model->family_role_id,
            'family_role_name'          => $family_role->name,
            'family_patient_id'         => $model->patient_id ?? null,
            'family_name'               => $model->family_name,
            'child_position'            => $model->child_position ?? null
        ];
    }
}
