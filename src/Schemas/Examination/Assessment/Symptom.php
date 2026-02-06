<?php

namespace Hanafalah\ModuleExamination\Schemas\Examination\Assessment;

use Hanafalah\ModuleExamination\Contracts\Data\AssessmentData;
use Hanafalah\ModuleExamination\Contracts\Schemas\Examination\Assessment\Symptom as AssessmentSymptom;
use Illuminate\Database\Eloquent\{
    Model
};

class Symptom extends Assessment implements AssessmentSymptom
{
    protected string $__entity   = 'Symptom';

    public function prepareStore(AssessmentData &$assessment_dto): Model{
        $symptom = parent::prepareStore($assessment_dto);
        return $symptom;
    }
}
