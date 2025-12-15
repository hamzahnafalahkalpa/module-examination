<?php

namespace Hanafalah\ModuleExamination\Schemas\Examination\Assessment\Diagnose;

use Hanafalah\ModuleExamination\Contracts\Schemas\Examination\Assessment\Diagnose\PatientFamilyIllness as ContractsPatientFamilyIllness;
use Illuminate\Database\Eloquent\Model;

class PatientFamilyIllness extends Diagnose implements ContractsPatientFamilyIllness
{
    protected string $__entity   = 'PatientFamilyIllness';

    public function prepareStore(mixed &$assessment_dto): Model{
        $temp_exam = $assessment_dto->props['exam'];
        $assessment_exam = &$assessment_dto->props['exam'];
        if (isset($assessment_exam['type'])){
            $type = $assessment_exam['type'];
            unset($temp_exam['type']);
            $assessment_exam = [];
            if ($type == 'FamilyIllness') {
                $assessment_exam['family_illness'] = $temp_exam;
            }
            if ($type == 'HistoryIllness') {
                $assessment_exam['history_illness'] = $temp_exam;
            }
            $this->prepareStoreAssessment($assessment_dto);
        }else{
            $this->prepareStoreAssessment($assessment_dto);
        }
        if (isset($assessment_exam['family_illness'])) {
            $assessment_exam = $temp_exam;
            $this->schemaContract('family_illness')->prepareStore($assessment_dto);
        }
        if (isset($assessment_exam['history_illness'])) {
            $assessment_exam = $temp_exam;
            $this->schemaContract('history_illness')->prepareStore($assessment_dto);
        }
        return $this->assessment_model;
    }
}
