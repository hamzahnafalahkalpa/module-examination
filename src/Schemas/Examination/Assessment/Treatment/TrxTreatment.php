<?php

namespace Gii\ModuleExamination\Schemas\Examination\Assessment\Treatment;

use Gii\ModuleExamination\Contracts\{
    Examination\Assessment\Treatment\TrxTreatment as ContractsTrxTreatment,
};
use Gii\ModuleExamination\Schemas\Examination\Assessment\Assessment;
use Illuminate\Database\Eloquent\Model;

class TrxTreatment extends Assessment implements ContractsTrxTreatment{
    public static $trx_treatment_model;

    public function prepareRemoveAssessment(? array $attributes = null): bool{
        $attributes ??= \request()->all();
        $result = parent::prepareRemoveAssessment($attributes);
        if (isset(static::$assessment_model)){
            $this->ExaminationTreatmentModel()->where('reference_id',static::$assessment_model->getKey())
                 ->where('reference_type',static::$assessment_model->morph)
                 ->where('treatment_id',static::$assessment_model->treatment_id)
                 ->delete();
            if (isset(static::$assessment_model->form) && isset(static::$assessment_model->form['id'])){
                $this->AssessmentModel()->destroy(static::$assessment_model->form['id']);
            }
        }
        return $result;
    }

    public function prepareStore(? array $attributes = null): Model{
        $attributes ??= request()->all();
        $attributes['status'] ??= 'DRAFT';
        $this->prepareStoreAssessment($attributes);

        $treatment = $this->TreatmentModel()->findOrFail($attributes['treatment_id']);
        $attributes['reference_id']   = $treatment->reference_id;
        $attributes['reference_type'] = $treatment->reference_type;
        $attributes['service_label']  = $treatment->service_label;

        static::$trx_treatment_model  = $treatment;

        $attributes['interpretation'] = $attributes['interpretation'] ?? null;
        $attributes['result']         = $attributes['results'] ?? $attributes['result'] ?? "" ;
        $attributes['qty']            = $attributes['qty'] ?? 1;

        if (isset($attributes['files']) && count($attributes['files']) > 0) {
            $attributes = $this->storePdf($attributes,'treatment_'.$treatment->reference_type);
        }
        $attributes['name']         = $treatment->name;
        $attributes['treatment_at'] = now();
        
        $this->addExaminationTreatment($attributes);
        $this->setAssessmentProp($attributes);

        $assessment = static::$assessment_model;

        if (isset($attributes['form'])){
            $this->prepareMorphs();

            $service_label = $treatment->service_label;
            if (isset($service_label)){
                $service_label = $this->ExaminationStuffModel()->findOrFail($service_label['id']);
                if (isset($service_label) && $service_label->name == 'VACCINE'){
                    $medical_treatment = $treatment->reference;
                    $master_vaccine    = $this->MasterVaccineModel()->find($medical_treatment->vaccine_id);
                    if (isset($master_vaccine)){
                        $vaccine = [
                            'id'   => $master_vaccine->getKey(),
                            'name' => $master_vaccine->name
                        ];
                        $attributes['name'] = $master_vaccine->name;
                    }
                    $class = new $this->__morphs['Vaccine'];
                    $new_assessment = $class->prepareStore($this->mergeArray([
                        'visit_examination_id'   => static::$__visit_examination->getKey(),
                        'examination_summary_id' => static::$__examination_summary->getKey(),
                        'patient_summary_id'     => static::$__patient_summary->getKey(),
                        'treatment_id'           => static::$trx_treatment_model->getKey(),
                        'parent_id'              => static::$assessment_model->getKey(),
                        'patient_id'             => static::$__visit_patient->patient_id ?? null,
                        'vaccine'                => $vaccine ?? null
                    ], $attributes['form']));
                    $attributes['form']['is_lifetime'] = $new_assessment->is_lifetime;
                    $attributes['form']['valid_until'] = $new_assessment->valid_until;
                    $attributes['form']['id'] = $new_assessment->getKey();
                    $assessment->setAttribute('form',$attributes['form']);
                }else{
                    $assessment->setAttribute('form',$attributes['form']);
                }
            }else{
                $assessment->form = null;
                unset($attributes['form']);
            }
        }
        $assessment->save();
        return static::$assessment_model = $assessment;
    }

    public function addExaminationTreatment(? array $attributes = null): Model{
        $attributes['reference_id']   = static::$assessment_model->getKey();
        $attributes['reference_type'] = static::$assessment_model->morph;
        unset($attributes['id']);

        $examination_treatment_schema = $this->schemaContract('examination_treatment');
        return $examination_treatment_schema->prepareStoreExaminationTreatment($attributes);
    }
}
