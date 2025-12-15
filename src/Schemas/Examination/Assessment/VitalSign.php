<?php

namespace Hanafalah\ModuleExamination\Schemas\Examination\Assessment;

use Hanafalah\ModuleExamination\Contracts\Data\AssessmentData;
use Hanafalah\ModuleExamination\Contracts\Schemas\Examination\Assessment\VitalSign as AssessmentVitalSign;
use Hanafalah\ModuleExamination\Schemas\Examination\Assessment\Assessment;
use Illuminate\Database\Eloquent\Model;

class VitalSign extends Assessment implements AssessmentVitalSign
{
    protected string $__entity   = 'VitalSign';

    public function prepareStore(AssessmentData &$assessment_dto): Model
    {
        $vital_sign = parent::prepareStore($assessment_dto);
        $patient_summary_model = $assessment_dto->patient_summary_model;
        $patient_summary_model->setAttribute('vital_sign', $vital_sign->exam);
        $patient_summary_model->save();
        return $this->assessment_model = $vital_sign;
    }

    protected function prepareAfterResolve(Model &$assessment_model, mixed &$assessment_dto): void{
        $assessment_exam = &$assessment_dto->props['exam'];
        $loc = $this->VitalSignStuffModel();
        if (isset($assessment_exam['loc_id'])){
            $loc = $loc->findOrFail($assessment_exam['loc_id']);
        }
        $assessment_exam['loc'] = $loc->toViewApiOnlies('id','name','flag','label');

        $systolic = $assessment_exam['systolic'] ?? 0;
        $diastolic = $assessment_exam['diastolic'] ?? 0;

        $blood_pressure_status = 'NORMAL';
        $hypertension_level = null;

        if ($systolic >= 180 || $diastolic >= 120) {
            $blood_pressure_status = 'HYPERTENSIVE_CRISIS';
            $hypertension_level = 'CRITICAL';
        } elseif ($systolic >= 140 || $diastolic >= 90) {
            $blood_pressure_status = 'HYPERTENSION';
            $hypertension_level = 'STAGE_2';
        } elseif ($systolic >= 130 || $diastolic >= 80) {
            $blood_pressure_status = 'HYPERTENSION';
            $hypertension_level = 'STAGE_1';
        } elseif ($systolic >= 120 && $diastolic < 80) {
            $blood_pressure_status = 'ELEVATED';
        }        

        $temperature = $assessment_exam['temperature'] ?? 0;
        
        $temperature_status = 'NORMAL';
        $temperature_level = null;

        if ($temperature >= 40.1) {
            $temperature_status = 'VERY_HIGH_FEVER';
            $temperature_level = 'CRITICAL';
        } elseif ($temperature >= 39.1) {
            $temperature_status = 'HIGH_FEVER';
            $temperature_level = 'SEVERE';
        } elseif ($temperature >= 38.1) {
            $temperature_status = 'FEVER';
            $temperature_level = 'MODERATE';
        } elseif ($temperature >= 37.3) {
            $temperature_status = 'LOW_GRADE_FEVER';
            $temperature_level = 'MILD';
        } elseif ($temperature < 36.0 && $temperature > 0) {
            $temperature_status = 'HYPOTHERMIA';
            $temperature_level = 'ABNORMAL';
        }

        $assessment_dto->props['temperature_status'] = $temperature_status;
        $assessment_dto->props['temperature_level'] = $temperature_level;

        // Expert system decision for oxygen saturation assessment
        $oxygen_saturation = $assessment_exam['oxygen_saturation'] ?? 0;
        
        $oxygen_status = 'NORMAL';
        $oxygen_level = null;

        if ($oxygen_saturation < 85 && $oxygen_saturation > 0) {
            $oxygen_status = 'SEVERE_HYPOXEMIA';
            $oxygen_level = 'CRITICAL';
        } elseif ($oxygen_saturation < 90) {
            $oxygen_status = 'MODERATE_HYPOXEMIA';
            $oxygen_level = 'MODERATE';
        } elseif ($oxygen_saturation < 95) {
            $oxygen_status = 'MILD_HYPOXEMIA';
            $oxygen_level = 'MILD';
        }

        $assessment_dto->props['oxygen_status'] = $oxygen_status;
        $assessment_dto->props['oxygen_level'] = $oxygen_level;
        $assessment_dto->props['blood_pressure_status'] = $blood_pressure_status;
        $assessment_dto->props['hypertension_level'] = $hypertension_level;
    }
}
