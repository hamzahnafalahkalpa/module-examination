<?php

namespace Hanafalah\ModuleExamination\Schemas\Examination\Assessment;

use Hanafalah\ModuleExamination\Contracts\Data\AssessmentData;
use Hanafalah\ModuleExamination\Contracts\Schemas\Examination\Assessment\Anthropometry as AssessmentAnthropometry;
use Hanafalah\ModuleExamination\Schemas\Examination\Assessment\Assessment;
use Illuminate\Database\Eloquent\Model;

class Anthropometry extends Assessment implements AssessmentAnthropometry
{
    protected string $__entity   = 'Anthropometry';

    public function prepareStore(AssessmentData &$assessment_dto): Model
    {
        $anthropometry = parent::prepareStore($assessment_dto);
        $patient_summary_model = $assessment_dto->patient_summary_model;
        $patient_summary_model->setAttribute('anthropometry', $anthropometry->exam);
        $patient_summary_model->save();
        return $this->assessment_model = $anthropometry;
    }

    protected function prepareAfterResolve(Model &$assessment_model, mixed &$assessment_dto): void{
        $assessment_exam = &$assessment_dto->props['exam'];
        // Calculate BMI (IMT - Indeks Massa Tubuh)
        $weight = $assessment_exam['weight'] ?? null;
        $height = $assessment_exam['height'] ?? null;
        $bmi = null;
        $bmi_category = null;

        if ($weight && $height) {
            $height_m = $height / 100; // convert cm to meters
            $bmi = round($weight / ($height_m * $height_m), 2);
            
            // WHO BMI Classification for Asian populations
            if ($bmi < 18.5) {
                $bmi_category = 'Underweight';
            } elseif ($bmi >= 18.5 && $bmi < 23) {
                $bmi_category = 'Normal';
            } elseif ($bmi >= 23 && $bmi < 25) {
                $bmi_category = 'Overweight';
            } elseif ($bmi >= 25 && $bmi < 30) {
                $bmi_category = 'Obese I';
            } else {
                $bmi_category = 'Obese II';
            }
        }

        $assessment_exam['bmi'] = $bmi;
        $assessment_exam['bmi_category'] = $bmi_category;

        // Calculate Waist-to-Hip Ratio (WHR)
        $waist = $assessment_exam['waist_circumference'] ?? null;
        $hip = $assessment_exam['hip_circumference'] ?? null;
        $whr = null;
        $whr_risk = null;

        if ($waist && $hip) {
            $whr = round($waist / $hip, 2);
            // Risk classification (gender-dependent, assuming average)
            $whr_risk = $whr > 0.90 ? 'High Risk' : 'Low Risk';
        }

        $assessment_exam['whr'] = $whr;
        $assessment_exam['whr_risk'] = $whr_risk;

        // Calculate Body Frame Size using wrist circumference
        $wrist = $assessment_exam['wrist_circumference'] ?? null;
        $body_frame = null;

        if ($wrist && $height) {
            $r_value = $height / $wrist;
            if ($r_value > 10.4) {
                $body_frame = 'Small';
            } elseif ($r_value >= 9.6 && $r_value <= 10.4) {
                $body_frame = 'Medium';
            } else {
                $body_frame = 'Large';
            }
        }

        $assessment_exam['body_frame'] = $body_frame;

        // Calculate Ideal Body Weight (Broca Index)
        $ideal_weight = null;
        if ($height) {
            $ideal_weight = round(($height - 100) - (($height - 100) * 0.1), 2);
        }

        $assessment_exam['ideal_weight'] = $ideal_weight;

        $hypertension_level = $assessment_dto->props['hypertension_level'] ?? null;
        $assessment_dto->props['hypertension_level'] = $hypertension_level;
    }
}
