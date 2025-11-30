<?php

namespace Hanafalah\ModuleExamination\Schemas\Examination\Assessment\Prescription;

use Hanafalah\ModuleExamination\Contracts\Schemas\Examination\Assessment\Prescription\TrxPrescription as PrescriptionTrxPrescription;
use Hanafalah\ModuleExamination\Schemas\Examination\Assessment\Assessment;
use Illuminate\Database\Eloquent\Model;
use Hanafalah\ModuleExamination\Contracts\Data\AssessmentData;

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

    public function addPrescription(AssessmentData $assessment_dto,Model $assessment, string $key): Model{
        $cogs = 0;
        $price = 0;
        $assessment_exam = &$assessment_dto->props['exam'][$key];
        $qty = $assessment_exam['qty'] ?? 1;
        if (isset($assessment_exam['card_stock'])){
            $item_model = $this->ItemModel()->findOrFail($assessment_exam['card_stock']['item_id']);
            $cogs = $item_model->cogs * $assessment_exam['card_stock']['stock_movement']['qty'];
            $price = $item_model->selling_price;
        }else{
            foreach ($assessment_exam['card_stocks'] as $card_stock) {
                $item_model = $this->ItemModel()->findOrFail($card_stock['item_id']);
                $cogs  += $item_model->cogs * $card_stock['stock_movement']['qty'] * $qty;
                $price += $item_model->selling_price * $card_stock['stock_movement']['qty'];
            }
        }
        $visit_examination_model = $assessment_dto->visit_examination_model;
        return $this->schemaContract('prescription')->prepareStorePrescription($this->requestDTO(
            config('app.contracts.PrescriptionData'),
            [
                'name'                     => $assessment->name ?? $item_model->name,
                'reference_id'             => $assessment->getKey(),
                'reference_type'           => $assessment->morph,
                'reference_model'          => $assessment,
                'pharmacy_sale_id'         => $visit_examination_model->visit_patient_id,
                'patient_summary_id'       => $assessment_dto->patient_summary_model->getKey(),
                'visit_examination_id'     => $assessment_dto->visit_examination_id,
                'visit_examination_model'  => $visit_examination_model,
                'visit_registration_model' => $assessment_dto->visit_registration_model,
                'visit_patient_model'      => $assessment_dto->visit_patient_model,
                'patient_model'            => $assessment_dto->patient_model,
                'patient_summary_model'    => $assessment_dto->patient_summary_model,
                'qty'                      => $qty,
                'cogs'                     => $cogs,
                'price'                    => $price,
                'total_price'              => $price * $qty,
            ]
        ));

        // $attributes['reference_id']     = $this->assessment_model->getKey();
        // $attributes['reference_type']   = $this->assessment_model->morph;
        // $attributes['assessment_id']  ??= $this->assessment_model->getKey();
        // $prescription_schema = $this->schemaContract('prescription');
        // return $prescription_schema->prepareStorePrescription($attributes);
    }
}
