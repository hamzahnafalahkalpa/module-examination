<?php

namespace Hanafalah\ModuleExamination\Models\Examination\Assessment\Prescription;

use Hanafalah\ModuleExamination\Models\Examination\Assessment\Assessment;

class TrxPrescription extends Assessment
{
    protected $table         = 'assessments';
    public $response_model   = 'array';

    protected static function booted(): void
    {
        parent::booted();
        static::deleted(function ($query) {
            $query->prescription()->delete();
        });
    }

    protected function setItemStock($item_id, $result)
    {
        $item = $this->ItemModel()
            ->with([
                'itemStock' => function ($query) use ($result) {
                    $query->whereNull('funding_id')
                        ->where('warehouse_id', $result['warehouse_id'])
                        ->where('warehouse_type', $result['warehouse_type'])
                        ->where('stock', '>', 0)
                        ->with([
                            'childs' => function ($query) {
                                $query->with([
                                    'funding',
                                    'stockBatches' => function ($query) {
                                        $query->with('batch')->where('stock', '>', 0);
                                    }
                                ])->where('stock', '>', 0);
                            }
                        ]);
                }
            ])
            ->find($item_id);
        return (isset($item))
            ? $item->toViewApi()->resolve()
            : $card_stock['item'] = null;
    }

    public function prescription()
    {
        return $this->morphOneModel('Prescription', 'reference');
    }
}
