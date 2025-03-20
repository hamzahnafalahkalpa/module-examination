<?php

namespace Gii\ModuleExamination\Models\Examination\Assessment\Prescription;

class MedicinePrescription extends TrxPrescription {
    protected $table = 'assessments';
    public $specific = [
        'name',
        'treatment_duration',
        'card_stock',
        'frequency_qty',
        'frequency_unit_id',
        'frequency_division',
        'dosage_instruction',
        'iteration',
        'indication',
        'qty',
        'price',
        'cogs',
        'warehouse_id',
        'warehouse_type'
    ];

    public function getExamResults($model): array{
        $result  = parent::getExamResults($model);
        $frqunecty_unit = $this->ItemStuffModel()->where('id',$result['frequency_unit_id'])->first() ?? null;
        $result['frequency_unit'] = null;
        if (isset($frqunecty_unit)){
            $result['frequency_unit']   = [
                'id'    => $frqunecty_unit->getKey(),
                'name'  => $frqunecty_unit->name
            ];
        }
        $card_stock = &$result['card_stock'];
        if (isset($result['warehouse_id']) && isset($result['warehouse_id'])){
            $card_stock['item'] = $this->setItemStock($card_stock['item_id'],$result);
        }
        return $result;
    }
}
