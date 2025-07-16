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
        $exam = $model->exam;
        $family_role = $this->ExaminationStuffModel()->find($exam['family_role_id']);
        return [
            'name'                      => $exam['name'],
            'disease_type'              => $exam['disease_type'],
            'disease_id'                => $exam['disease_id'],
            'classification_disease_id' => $exam['classification_disease_id'] ?? null,
            'family_role_id'            => $exam['family_role_id'],
            'family_role_name'          => $family_role->name,
            // 'family_patient_id'         => $model->patient_id ?? null,
            'family_name'               => $exam['family_name'],
            'child_position'            => $exam['child_position'] ?? null
        ];
    }
}
