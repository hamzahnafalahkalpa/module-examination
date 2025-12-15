<?php

namespace Hanafalah\ModuleExamination\Schemas\Examination\Assessment\Prescription;

use Hanafalah\ModuleExamination\Contracts\Schemas\Examination\Assessment\Prescription\BasicPrescription as ContractsBasicPrescription;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class BasicPrescription extends TrxPrescription implements ContractsBasicPrescription
{
    protected string $__entity   = 'BasicPrescription';

    public function prepareStore(mixed &$assessment_dto): Model{
        // $temp_exam = $assessment_dto->props['exam'];
        $assessment_exam = &$assessment_dto->props['exam'];
        $visit_examination_model = $assessment_dto->visit_examination_model;
        $visit_examination_model->is_has_prescription = true;
        $visit_examination_model->is_prescription_completed = false;
        $visit_examination_model->save();
        if (isset($assessment_exam['type'])){
            // $type = $assessment_exam['type'];
            // unset($temp_exam['type']);
            // $assessment_exam = [];
            // if ($type == 'MedicinePrescription') {
            //     $assessment_exam['medicine_prescription'] = $temp_exam;
            //     $exam_data = $assessment_exam['medicine_prescription'];
            // }
            // if ($type == 'MedicToolPrescription') {
            //     $assessment_exam['medic_tool_prescription'] = $temp_exam;
            //     $exam_data = $assessment_exam['medic_tool_prescription'];
            // }
            // if ($type == 'MixPrescription') {
            //     $assessment_exam['mix_prescription'] = $temp_exam;
            //     $exam_data = $assessment_exam['mix_prescription'];
            // }
            $assessment = $this->prepareStoreAssessment($assessment_dto);
            if (isset($assessment_exam['is_pharmacy_sale']) && $assessment_exam['is_pharmacy_sale']){
                $this->addPrescription($assessment_dto,$assessment, Str::snake($type));
            }
        }else{
            $assessment = $this->prepareStoreAssessment($assessment_dto);
            if (isset($assessment_exam['is_pharmacy_sale']) && $assessment_exam['is_pharmacy_sale']){
                $this->addPrescription($assessment_dto,$assessment, Str::snake($assessment->morph));
            }
        }

        $payment_summary_model = $assessment_dto->patient_summary_model;
        $medications = $payment_summary_model->medications ?? [];
        array_unshift($medications, $assessment->exam);
        $medications = array_slice($medications, 0, 10);
        $payment_summary_model->setAttribute('medications', $medications);
        $payment_summary_model->save();
        // if (isset($assessment_exam['medicine_prescription'])) {
        //     $assessment_exam = $temp_exam;
        //     $assessment_dto->morph = 'MedicinePrescription';
        //     $this->schemaContract('medicine_prescription')->prepareStore($assessment_dto);
        // }
        // if (isset($assessment_exam['medic_tool_prescription'])) {
        //     $assessment_exam = $temp_exam;
        //     $assessment_dto->morph = 'MedicToolPrescription';
        //     $this->schemaContract('medic_tool_prescription')->prepareStore($assessment_dto);
        // }
        // if (isset($assessment_exam['mix_prescription'])) {
        //     $assessment_exam = $temp_exam;
        //     $assessment_dto->morph = 'MixPrescription';
        //     $this->schemaContract('mix_prescription')->prepareStore($assessment_dto);
        // }
        return $this->assessment_model;
    }
}
