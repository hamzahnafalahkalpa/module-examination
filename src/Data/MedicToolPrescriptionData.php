<?php

namespace Hanafalah\ModuleExamination\Data;

use Hanafalah\ModuleExamination\Contracts\Data\MedicToolPrescriptionData as DataMedicToolPrescriptionData;

class MedicToolPrescriptionData extends TrxPrescriptionData implements DataMedicToolPrescriptionData
{
    public static function before(array &$attributes){
        $new = static::new();
        parent::before($attributes);
        $attribute_exam = &$attributes['exam'];
        $new->initializePrescription($attribute_exam);
        $new->initializeCardStock($attribute_exam,$attribute_exam['card_stock']);
        $attribute_exam['qty'] ??= $attribute_exam['card_stock']['stock_movement']['qty'] ?? 0;
        return $attributes;
    }
}