<?php

namespace Gii\ModuleExamination\Models\Examination\Assessment\Prescription;

class MedicToolPrescription extends TrxPrescription {
    protected $table = 'assessments';
    public $specific = [
        'name',
        'card_stock',
        'iteration',
        'qty',
        'price',
        'cogs',
        'warehouse_id',
        'warehouse_type'
    ];

    public function getExamResults($model): array{
        $result     = parent::getExamResults($model);
        $card_stock = &$result['card_stock'];
        if (isset($result['warehouse_id']) && isset($result['warehouse_id'])){
            $card_stock['item'] = $this->setItemStock($card_stock['item_id'],$result);
        }
        return $result;
    }
}
