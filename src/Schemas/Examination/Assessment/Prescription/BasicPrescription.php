<?php

namespace Hanafalah\ModuleExamination\Schemas\Examination\Assessment\Diagnose;

use Hanafalah\ModuleExamination\Contracts\Schemas\Examination\Assessment\Prescription\BasicPrescription as ContractsBasicPrescription;
use Illuminate\Database\Eloquent\Model;

class BasicPrescription extends Diagnose implements ContractsBasicPrescription
{
    protected string $__entity   = 'BasicPrescription';

    public function prepareStore(mixed $assessment_dto): Model{
        $temp_exam = $assessment_dto->props['exam'];
        $assessment_exam = &$assessment_dto->props['exam'];
        if (isset($assessment_exam['type'])){
            $type = $assessment_exam['type'];
            unset($temp_exam['type']);
            $assessment_exam = [];
            if ($type == 'MedicinePrescription') {
                $assessment_exam['medicine_prescription'] = $temp_exam;
            }
            if ($type == 'MedicToolPrescription') {
                $assessment_exam['medic_tool_prescription'] = $temp_exam;
            }
            if ($type == 'MixPrescription') {
                $assessment_exam['mix_prescription'] = $temp_exam;
            }
            $this->prepareStoreAssessment($assessment_dto);
        }else{
            $this->prepareStoreAssessment($assessment_dto);
        }
        if (isset($assessment_exam['medicine_prescription'])) {
            $assessment_exam = $temp_exam;
            $this->schemaContract('medicine_prescription')->prepareStore($assessment_dto);
        }
        if (isset($assessment_exam['medic_tool_prescription'])) {
            $assessment_exam = $temp_exam;
            $this->schemaContract('medic_tool_prescription')->prepareStore($assessment_dto);
        }
        if (isset($assessment_exam['mix_prescription'])) {
            $assessment_exam = $temp_exam;
            $this->schemaContract('mix_prescription')->prepareStore($assessment_dto);
        }
        return $this->assessment_model;
    }
}
