<?php

namespace Hanafalah\ModuleExamination\Data;

use Hanafalah\ModuleExamination\Contracts\Data\TrxPrescriptionData as DataTrxPrescriptionData;

class TrxPrescriptionData extends AssessmentData implements DataTrxPrescriptionData
{
    public function initializePrescription(array &$attribute_exam){
        $warehouse = app(config('database.models.'.config('module-examination.warehouse')));
        if (isset($warehouse)){
            $attribute_exam['warehouse_type'] = $warehouse->getMorphClass();
            if (isset($attribute_exam['warehouse_id'])){
                $attribute_exam['warehouse_id'] = $warehouse->find($attribute_exam['warehouse_id'])->getKey();
            }
            $attribute_exam['pharmacy_type'] ??= $warehouse->getMorphClass();
        }
        $attribute_exam['warehouse_id'] ??= null;
        $attribute_exam['pharmacy_id'] ??= null;        
    }

    public function initializeCardStock(array &$attribute_exam, array &$card_stock){
        $new = static::new();

        $item = $new->ItemModel()->findOrFail($card_stock['item_id']);
        $attribute_exam['price'] ??= 0;
        $attribute_exam['cogs']  ??= 0;
        $attribute_exam['price'] += $item->selling_price;
        $attribute_exam['cogs']  += $item->cogs;

        // $unit                  = $new->ItemStuffModel()->find($attribute_exam['stock_movement']['qty_unit_id'] ?? $item->unit_id);
        $qty                   = $card_stock['stock_movement']['qty'];
        $card_stock['item_id'] = $item->getKey();
        $card_stock['name']    = $item->name;
        $attribute_exam['card_stock']['stock_movement'] ??= [
            "qty"            => $qty,
            "qty_unit_id"    => $card_stock['stock_movement']['qty_unit_id'] ?? null
        ];
        $attribute_exam['name'] ??= $item->name;
    }
}