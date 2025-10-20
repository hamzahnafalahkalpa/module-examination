<?php

namespace Hanafalah\ModuleExamination\Schemas\Examination\Assessment\Diagnose;

use Hanafalah\ModuleExamination\Contracts\Schemas\Examination\Assessment\Diagnose\Diagnose as ContractsDiagnose;
use Hanafalah\ModuleExamination\Schemas\Examination\Assessment\Assessment;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Diagnose extends Assessment implements ContractsDiagnose
{
    public $disease_model;


    public function prepareStore(mixed $assessment_dto): Model{
        $assessment_exam = &$assessment_dto->props['exam'];
        $disease = $this->DiseaseModel()->with('classificationDisease')->find($assessment_exam['disease_id']);
        $assessment_exam['disease_code'] = $disease->code ?? null;
        $assessment = $this->prepareStoreAssessment($assessment_dto);
        if (!isset($disease)) {
            $disease_schema = $this->schemaContract('disease');
            $disease = $disease_schema->prepareStoreDisease($this->requestDTO(config('app.contracts.DiseaseData'),[
                "name" => $assessment_exam['name'] ?? null,
                "classification_disease_id" => $assessment_exam['classification_disease_id'] ?? null,
            ]));
            $assessment_exam['disease_id'] = $disease->getKey();
        }
        $this->disease_model = $disease;

        $classification_disease = $disease->classificationDisease;
        $assessment_exam['disease_type']              = $disease->getMorphClass();
        $assessment_exam['name']                      = $classification_disease->name ?? $disease->name;
        $assessment_exam['classification_disease_id'] = $classification_disease->id ?? null;
        // $this->addPatientIllness($assessment_exam);
        $this->assessment_model->save();
        return $this->assessment_model;
    }

    public function addPatientIllness(?array $attributes = null): Model
    {
        $attributes['reference_id']   = $this->assessment_model->getKey();
        $attributes['reference_type'] = $this->assessment_model->morph;
        $attributes['disease_name']   = $this->disease_model->name;
        unset($attributes['id']);
        $patient_illness_schema = $this->schemaContract('patient_illness');
        return $patient_illness_schema->prepareStorePatientIllness($attributes);
    }

    public function diagnose(mixed $conditionals = null): Builder{
        return $this->generalSchemaModel($conditionals)->withParameters('or')->orderBy('name', 'asc');
    }
}
