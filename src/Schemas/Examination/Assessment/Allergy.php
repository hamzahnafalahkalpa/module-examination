<?php

namespace Hanafalah\ModuleExamination\Schemas\Examination\Assessment;

use Hanafalah\ModuleExamination\Contracts\Data\AssessmentData;
use Hanafalah\ModuleExamination\Contracts\Schemas\Examination\Assessment\Allergy as AssessmentAllergy;
use Illuminate\Database\Eloquent\{
    Model
};

class Allergy extends Assessment implements AssessmentAllergy
{
    protected string $__entity   = 'Allergy';
    public $allergy_model;

    public function prepareStore(AssessmentData &$assessment_dto): Model{
        $allergy = parent::prepareStore($assessment_dto);
        $patient_summary_model = $assessment_dto->patient_summary_model;
        $allergies = $patient_summary_model->allergies ?? [];
        array_unshift($allergies, $allergy->exam);
        $allergies = array_slice($allergies, 0, 10);
        $patient_summary_model->setAttribute('allergies', $allergies);
        $patient_summary_model->save();
        return $allergy;
    }
}
