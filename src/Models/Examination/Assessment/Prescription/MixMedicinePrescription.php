<?php

namespace Hanafalah\ModuleExamination\Models\Examination\Assessment\Prescription;

class MixMedicinePrescription extends TrxPrescription
{
    protected $table = 'assessments';
    public $specific = [
        'name',
        'treatment_duration',
        'qty',
        'qty_unit_id',
        'qty_unit_name',
        'frequency_qty',
        'frequency_unit_id',
        'frequency_unit_name',
        'frequency_division',
        'usage_route_id',
        'usage_route_name',
        'dosage_instruction',
        'iteration',
        'indication',
        'card_stocks',
        'warehouse_id',
        'warehouse_type'
    ];

    public function getExamResults($model): array{
        $result     = parent::getExamResults($model = null);
        $frqunecty_unit = $this->ItemStuffModel()->where('id', $result['frequency_unit_id'])->first() ?? null;
        $result['frequency_unit'] = null;
        if (isset($frqunecty_unit)) {
            $result['frequency_unit']   = [
                'id'    => $frqunecty_unit->getKey(),
                'name'  => $frqunecty_unit->name
            ];
        }
        foreach ($result['card_stocks'] as &$card_stock) {
            if (isset($result['warehouse_id']) && isset($result['warehouse_id'])) {
                $card_stock['item'] = $this->setItemStock($card_stock['item_id'], $result);
            }
        }
        return $result;
    }
}
