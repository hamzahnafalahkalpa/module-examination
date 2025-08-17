<?php

namespace Hanafalah\ModuleExamination\Schemas\Examination\Assessment\Prescription;

use Hanafalah\ModuleExamination\Contracts\Data\AssessmentData;
use Hanafalah\ModuleExamination\Contracts\Schemas\Examination\Assessment\Prescription\TrxPrescription as PrescriptionTrxPrescription;
use Hanafalah\ModuleExamination\Schemas\Examination\Assessment\Assessment;
use Illuminate\Database\Eloquent\Model;

class TrxPrescription extends Assessment implements PrescriptionTrxPrescription
{
    public $trx_treatment_model;

    public function prepareDeleteAssessment(?array $attributes = null): bool{
        $attributes ??= \request()->all();
        $assessment = $this->usingEntity()->findOrFail($attributes['id']);
        $child      = $assessment->child;

        $result = parent::prepareDeleteAssessment($attributes);
        $reference_id = [$this->assessment_model->getKey()];
        if (isset($child)) {
            $child->delete();
            $reference_id[] = $child->getKey();
        }
        $prescriptions = $this->PrescriptionModel()->whereIn('reference_id', $reference_id)
            ->where('reference_type', $this->assessment_model->morph)
            ->get();
        foreach ($prescriptions as $prescription) $prescription->delete();
        return $result;
    }

    public function addPrescription(?array $attributes = null): Model
    {
        $attributes['reference_id']     = $this->assessment_model->getKey();
        $attributes['reference_type']   = $this->assessment_model->morph;
        $attributes['assessment_id']  ??= $this->assessment_model->getKey();
        $prescription_schema = $this->schemaContract('prescription');
        return $prescription_schema->prepareStorePrescription($attributes);
    }
}
