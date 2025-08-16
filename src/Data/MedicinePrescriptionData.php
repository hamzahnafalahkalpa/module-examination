<?php

namespace Hanafalah\ModuleExamination\Data;

use Hanafalah\ModuleExamination\Contracts\Data\MedicinePrescriptionData as DataMedicinePrescriptionData;

class MedicinePrescriptionData extends TrxPrescriptionData implements DataMedicinePrescriptionData
{
    public static function before(array &$attributes){
        $new = static::new();
        parent::before($attributes);
        $attribute_exam = &$attributes['exam'];

        $new->initializePrescription($attribute_exam);
        $new->initializeCardStock($attribute_exam,$attribute_exam['card_stock']);
        $attribute_exam['qty'] ??= $attribute_exam['card_stock']['stock_movement']['qty'] ?? 0;

        if (isset($attribute_exam['frequency_unit_id'])){
            $freq_unit = $new->FreqUnitModel()->find($attribute_exam['frequency_unit_id']);
            $assessment_exam['frequency_unit'] = $freq_unit->toViewApiOnlies('id', 'name', 'flag', 'label');
        }

        if (isset($attribute_exam['frequency_division']) && $attribute_exam['frequency_division'] > 0 && $attribute_exam['frequency_qty'] > 0){
            $attribute_exam['treatment_duration'] = $attribute_exam['qty'] / ((24 / $attribute_exam['frequency_division']) * $attribute_exam['frequency_qty']);
            $attribute_exam['treatment_duration'] = ceil($attribute_exam['treatment_duration']);
        }
        return $attributes;
    }
}