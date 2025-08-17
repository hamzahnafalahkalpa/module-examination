<?php

namespace Hanafalah\ModuleExamination\Schemas\Examination\Assessment\Prescription;

use Hanafalah\ModuleExamination\Contracts\Schemas\Examination\Assessment\Prescription\MixPrescription as ContractsMixPrescription;

class MixPrescription extends TrxPrescription implements ContractsMixPrescription
{
    protected string $__entity   = 'MixPrescription';

    // public function prepareStore(mixed $attributes = null): Model
    // {
    //     $attributes ??= request()->all();

    //     if (isset($attributes['card_stocks']) && count($attributes['card_stocks']) > 0) {
    //         $unit = $this->ItemStuffModel()->findOrFail($attributes['qty_unit_id']);
    //         $attributes['qty_unit_name'] = $unit->name;
    //         $frequency_unit = $this->ItemStuffModel()->findOrFail($attributes['frequency_unit_id']);
    //         $attributes['frequency_unit_name'] = $frequency_unit->name;
    //         $user_route = $this->ItemStuffModel()->findOrFail($attributes['usage_route_id']);
    //         $attributes['usage_route_name'] = $user_route->name;
    //         foreach ($attributes['card_stocks'] as $card_stock) {
    //             $item = $this->ItemModel()->findOrFail($card_stock['item_id']);
    //             $card_stock['name'] = $item->name;
    //             if (isset($card_stock['stock_movement']['qty_unit_id'])) {
    //                 $unit_stock_movement = $this->ItemStuffModel()->find($card_stock['stock_movement']['qty_unit_id']);
    //                 $card_stock['stock_movement']['qty_unit_name'] = $unit_stock_movement->name;
    //             } else {
    //                 $card_stock['stock_movement']['qty_unit_name'] = $item->unit_name;
    //             }
    //         }
    //     } else {
    //         throw new \Exception('card_stocks is required and cannot be empty');
    //     }

    //     $assessment = parent::prepareStore($attributes);
    //     $this->addPrescription($attributes);
    //     return $this->assessment_model = $assessment;
    // }
}
