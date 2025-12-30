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

    protected function prepareAfterResolve(Model &$assessment_model, mixed &$assessment_dto): void{
        $assessment_exam = &$assessment_dto->props['exam'];
        $assessment_exam['allergy_type'] = $this->AllergyStuffModel()->findOrFail($assessment_exam['allergy_type_id'])->toViewApiOnlies('id','name','label','flag');
        switch ($assessment_exam['allergy_scale']){
            case 0 : $allergy_scale = 'Tidak ada gejala';break;
            case 1 : $allergy_scale = 'Ringan';break;
            case 2 : $allergy_scale = 'Sedang';break;
            case 3 : $allergy_scale = 'Berat';break;
            case 4 : $allergy_scale = 'Sangat Berat';break;
        }
        $assessment_exam['allergy_scale_spell'] = $allergy_scale;
    }
}
