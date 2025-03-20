<?php

namespace Hanafalah\ModuleExamination\Schemas\Examination\Assessment\Prescription;

use Hanafalah\ModuleExamination\Contracts\Examination\Assessment\Prescription\TrxPrescription as PrescriptionTrxPrescription;
use Hanafalah\ModuleExamination\Schemas\Examination\Assessment\Assessment;
use Illuminate\Database\Eloquent\Model;

class TrxPrescription extends Assessment implements PrescriptionTrxPrescription
{
    public static $trx_treatment_model;

    public function prepareRemoveAssessment(?array $attributes = null): bool
    {
        $attributes ??= \request()->all();
        $assessment = $this->AssessmentModel()->findOrFail($attributes['id']);
        $child      = $assessment->child;

        $result = parent::prepareRemoveAssessment($attributes);
        $reference_id = [static::$assessment_model->getKey()];
        if (isset($child)) {
            $child->delete();
            $reference_id[] = $child->getKey();
        }
        $prescriptions = $this->PrescriptionModel()->whereIn('reference_id', $reference_id)
            ->where('reference_type', static::$assessment_model->morph)
            ->get();
        foreach ($prescriptions as $prescription) $prescription->delete();
        return $result;
    }

    protected function medicationSetup(?array $attributes = null): array
    {
        $attributes ??= request()->all();

        if (isset($attributes['id'])) $trx_prescription = $this->trxPrescription()->find($attributes['id']);
        $attributes['card_stock']['item_id'] ??= $trx_prescription->card_stock['item_id'];

        $item = $this->ItemModel()->findOrFail($attributes['card_stock']['item_id']);
        $attributes['price'] = $item->selling_price;
        $attributes['cogs']  = $item->cogs;
        $attributes['warehouse_id']   ??= request()->pharmacy_id ?? request()->warehouse_id ?? null;

        $warehouse = app(config('module-examination.warehouse'))->find($attributes['warehouse_id']);
        (isset($warehouse)) ? $attributes['warehouse_type'] = $warehouse->getMorphClass() : $attributes['warehouse_id'] = null;

        $unit = $this->ItemStuffModel()->find($attributes['stock_movement']['qty_unit_id'] ?? $item->unit_id);
        $card_stock = $attributes['card_stock'];
        $qty        = $card_stock['stock_movement']['qty'];
        $attributes['qty'] = $qty;
        $attributes['card_stock'] = [
            "item_id"            => $item->getKey(),
            "name"               => $item->name,
            "stock_movement"     => [
                "qty"            => $qty,
                "qty_unit_id"    => $card_stock['stock_movement']['qty_unit_id'] ?? null,
                "qty_unit_name"  => $unit->name
            ]
        ];
        $attributes['name'] = $item->name;
        if (isset($attributes['frequency_division'])) {
            $attributes['treatment_duration'] = $qty / ((24 / $attributes['frequency_division']) * $attributes['frequency_qty']);
            $attributes['treatment_duration'] = ceil($attributes['treatment_duration']);
        }
        return $attributes;
    }

    public function addPrescription(?array $attributes = null): Model
    {
        $attributes['reference_id']   = static::$assessment_model->getKey();
        $attributes['reference_type'] = static::$assessment_model->morph;
        $attributes['assessment_id']  ??= static::$assessment_model->getKey();
        $prescription_schema = $this->schemaContract('prescription');
        return $prescription_schema->prepareStorePrescription($attributes);
    }
}
