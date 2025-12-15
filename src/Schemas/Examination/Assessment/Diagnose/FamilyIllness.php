<?php

namespace Hanafalah\ModuleExamination\Schemas\Examination\Assessment\Diagnose;

use Hanafalah\ModuleExamination\Contracts\Schemas\Examination\Assessment\Diagnose\FamilyIllness as ContractsFamilyIllness;
use Illuminate\Database\Eloquent\{
    Model
};

class FamilyIllness extends Diagnose implements ContractsFamilyIllness
{
    protected string $__entity   = 'FamilyIllness';

    public function prepareStore(mixed &$assessment_dto): Model{
        $family_illness = parent::prepareStore($assessment_dto);
        $patient_summary_model = $assessment_dto->patient_summary_model;
        $family_illnesses = $patient_summary_model->family_illnesses ?? [];
        array_unshift($family_illnesses, $family_illness->exam);
        $family_illnesses = array_slice($family_illnesses, 0, 10);
        $patient_summary_model->setAttribute('family_illnesses', $family_illnesses);
        $patient_summary_model->save();
        return $family_illness;
    }
}
