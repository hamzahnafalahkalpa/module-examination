<?php

namespace Hanafalah\ModuleExamination\Schemas\Examination\Assessment\Diagnose;

use Hanafalah\ModuleDisease\Contracts\Disease;
use Hanafalah\ModuleExamination\Contracts\Schemas\Examination\Assessment\Diagnose\Diagnose as ContractsDiagnose;
use Hanafalah\ModuleExamination\Contracts\Schemas\Examination\PatientIllness;
use Hanafalah\ModuleExamination\Schemas\Examination\Assessment\Assessment;
use Illuminate\Database\Eloquent\Model;
use Hanafalah\ModulePatient\Contracts\VisitExamination;

class Diagnose extends Assessment implements ContractsDiagnose
{
    public $disease_model;


    public function prepareStore(mixed $attributes = null): Model
    {
        $attributes ??= request()->all();

        // if (isset($attributes['id'])) {
        // $diagnose = $this->diagnose()->find($attributes['id']);
        // $attributes['disease_id'] = $diagnose->disease_id;
        // }

        $disease = $this->DiseaseModel()->with('classificationDisease')->find($attributes['disease_id']);
        $attributes['disease_code'] = $disease->code ?? null;
        $this->prepareStoreAssessment($attributes);

        if (!isset($disease)) {
            $disease_schema = $this->schemaContract('disease');
            $disease = $disease_schema->prepareStoreDisease($attributes);
            $attributes['disease_id'] = $disease->getKey();
        }
        static::$disease_model = $disease;

        $classification_disease = $disease->classificationDisease;
        $attributes['disease_type']              = $disease->getMorphClass();
        $attributes['name']                      = $classification_disease->name ?? $disease->name;
        $attributes['classification_disease_id'] = $classification_disease->id ?? null;
        $this->addPatientIllness($attributes);

        $this->setAssessmentProp($attributes);
        static::$assessment_model->save();
        return $this->assessment_model;
    }

    public function addPatientIllness(?array $attributes = null): Model
    {
        $attributes['reference_id']   = static::$assessment_model->getKey();
        $attributes['reference_type'] = static::$assessment_model->morph;
        $attributes['disease_name']   = static::$disease_model->name;
        unset($attributes['id']);
        $patient_illness_schema = $this->schemaContract('patient_illness');
        return $patient_illness_schema->prepareStorePatientIllness($attributes);
    }
}
