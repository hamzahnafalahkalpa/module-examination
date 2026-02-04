<?php

namespace Hanafalah\ModuleExamination\Schemas\Examination\Assessment\Diagnose;

use Hanafalah\ModuleExamination\Contracts\Data\AssessmentData;
use Hanafalah\ModuleExamination\Contracts\Schemas\Examination\Assessment\Diagnose\Diagnose as ContractsDiagnose;
use Hanafalah\ModuleExamination\Schemas\Examination\Assessment\Assessment;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Diagnose extends Assessment implements ContractsDiagnose
{
    public $disease_model;

    public function prepareStore(mixed &$assessment_dto): Model{
        $assessment_exam = &$assessment_dto->props['exam'];
        $this->initDiagnose($assessment_exam);
        $assessment_dto->morph = $this->__entity;
        $assessment = parent::prepareStore($assessment_dto);
        $disease = $this->disease_model;
        $classification_disease = $disease->classificationDisease;
        $assessment_exam['disease_type']              = $disease->getMorphClass();
        $assessment_exam['disease']                   = $disease->toViewApi()->resolve();
        $assessment_exam['name']                      = $classification_disease->name ?? $disease->name;
        $assessment_exam['classification_disease_id'] = $classification_disease->id ?? null;
        // if (in_array($assessment->morph,['BasicDiagnose','InitialDiagnose','PrimaryDiagnose','SecondaryDiagnose'])){
        //     $this->addPatientIllness($assessment_dto);
        // }
        $this->assessment_model->save();
        return $this->assessment_model;
    }


    protected function initDiagnose(&$assessment_exam){
        $assessment_exam['disease_type'] ??= 'Disease';
        $disease = $this->DiseaseModel()->with('parent')->find($assessment_exam['disease_id']);
        $assessment_exam['code'] ??= $disease->code ?? null;
        $parent = $disease->parent ?? $this->DiseaseModel();
        if (isset($disease) && isset($parent)) {
            $assessment_exam['classification_disease_id'] = $parent->id;
        }
        $assessment_exam['classification_disease'] = $parent->toViewApi()->resolve();
        $assessment_exam['disease_code'] = $disease->code ?? null;
        if (!isset($disease)) {
            $disease_schema = $this->schemaContract('disease');
            $disease = $disease_schema->prepareStoreDisease($this->requestDTO(config('app.contracts.DiseaseData'),[
                "name" => $assessment_exam['name'] ?? null,
                "classification_disease_id" => $assessment_exam['classification_disease_id'] ?? null,
            ]));
            $assessment_exam['disease_id'] = $disease->getKey();
        }
        $this->disease_model = $disease;
    }

    public function addPatientIllness(AssessmentData $assessment_dto): Model{
        $patient_illness = $this->schemaContract('patient_illness')->prepareStorePatientIllness($this->requestDTO(config('app.contracts.PatientIllnessData'), [
            'reference_type' => $this->assessment_model->morph,
            'reference_id' => $this->assessment_model->getKey(),
            'reference_model' => $this->assessment_model,
            'disease_type' => $this->disease_model->getMorphClass(),
            'disease_id' => $this->disease_model->getKey(),
            'patient_id' => $assessment_dto->patient_model->getKey(),
            'examination_summary_id'  => null,
            'patient_summary_id'      => $assessment_dto->patient_summary_id,
            'visit_examination_model' => $assessment_dto->visit_examination_model
        ]));

        $payment_summary_model = $assessment_dto->patient_summary_model;
        $patient_illnesses = $payment_summary_model->patient_illnesses ?? [];
        $patient_illness_resource = $patient_illness->toViewApi()->resolve();
        unset($patient_illness_resource['patient']);
        unset($patient_illness_resource['reference']);
        array_unshift($patient_illnesses, $patient_illness_resource);
        $patient_illnesses = array_slice($patient_illnesses, 0, 10);
        $payment_summary_model->setAttribute('patient_illnesses', $patient_illnesses);
        $payment_summary_model->save();
        return $patient_illness;
    }

    public function diagnose(mixed $conditionals = null): Builder{
        return $this->generalSchemaModel($conditionals)->withParameters('or')->orderBy('name', 'asc');
    }
}
