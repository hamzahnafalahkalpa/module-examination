<?php

namespace Hanafalah\ModuleExamination\Data;

use Hanafalah\ModuleExamination\Contracts\Data\MixPrescriptionData as DataMixPrescriptionData;

class MixPrescriptionData extends TrxPrescriptionData implements DataMixPrescriptionData
{
    public static function before(array &$attributes){
        $new = static::new();
        parent::before($attributes);
        $attribute_exam = &$attributes['exam'];
        $new->initializePrescription($attribute_exam);
        foreach ($attribute_exam['card_stocks'] as &$card_stock) {
            $new->initializeCardStock($attribute_exam,$card_stock);
        }
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