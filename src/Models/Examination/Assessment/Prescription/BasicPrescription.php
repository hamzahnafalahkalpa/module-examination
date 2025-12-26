<?php

namespace Hanafalah\ModuleExamination\Models\Examination\Assessment\Prescription;

use Hanafalah\ModuleExamination\Resources\Examination\Assessment\Prescription\BasicPrescription\{
    ViewBasicPrescription, ShowBasicPrescription
};
use Illuminate\Database\Eloquent\Model;

class BasicPrescription extends TrxPrescription
{
    protected $table = 'assessments';
    public $specific = [
        'medicine_prescription', 'medic_tool_prescription', 'mix_prescription'
    ];

    public function getExamResults(?Model $model = null): array{
        $model ??= $this;
        $result  = parent::getExamResults($model);
        // $frqunecty_unit = $this->ItemStuffModel()->where('id', $result['frequency_unit_id'])->first() ?? null;
        // $result['frequency_unit'] = null;
        // if (isset($frqunecty_unit)) {
        //     $result['frequency_unit']   = [
        //         'id'    => $frqunecty_unit->getKey(),
        //         'name'  => $frqunecty_unit->name
        //     ];
        // }
        if (isset($result['card_stock'])){
            $this->setCurrentItemStock($result['card_stock']);
        }elseif(isset($result['card_stocks'])){
            foreach ($result['card_stocks'] as &$card_stock) {
                $this->setCurrentItemStock($card_stock);
            }
        }
        return $result;
    }

    protected function setCurrentItemStock(&$card_stock)
    {
        $stock_movement = &$card_stock['stock_movement'];

        $item_model = $this->ItemModel()->with(['itemStock' => function($query){
            $query->whereNull('parent_id')->with('childs');
        }])->findOrFail($card_stock['item_id']);
        $item_stock = $item_model->itemStock;
        $stock_movement['item_stock'] = [
            "id" => $item_model->getKey(),
            "funding_id" => $item_stock->funding_id,
            'funding'    => $item_stock->prop_funding,
            'stock'      => $item_stock->stock,
            'childs'     => $item_stock->childs->map(function($child){
                return [
                    "id" => $child->getKey(),
                    "funding_id" => $child->funding_id,
                    'funding'    => $child->prop_funding,
                    'stock'      => $child->stock,
                    'actual_qty' => null
                ];
            })->toArray()
        ];
    }

    public function getViewResource(){
        return ViewBasicPrescription::class;
    }

    public function getShowResource(){
        return ShowBasicPrescription::class;
    }
}
