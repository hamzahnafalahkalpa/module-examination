<?php

namespace Hanafalah\ModuleExamination\Schemas\Examination;

use Hanafalah\ModuleExamination\Contracts;
use Hanafalah\ModuleExamination\Schemas\Examination;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Hanafalah\ModuleMedicService\Enums\Label;

class ExaminationTreatment extends Examination implements Contracts\Examination\ExaminationTreatment
{
    protected string $__entity = 'ExaminationTreatment';
    public static $examination_treatment_model;

    protected array $__cache = [
        'index' => [
            'name'      => 'examination-treatment',
            'tags'      => ['examination', 'examination-treatment', 'examination-treatment-index'],
            'duration'  => 30
        ]
    ];

    public function prepareStoreMultipleExaminationTreatment(?array $attributes = null): Collection
    {
        $attributes ??= request()->all();
        $treatments   = $this->mustArray($attributes['treatment'] ?? $attributes['treatments']);
        $practitioner = $this->addPractitioner($attributes['visit_examination_id']);

        $treatment_models = [];
        foreach ($treatments as $treatment) {
            $treatment = $this->mergeArray($treatment, [
                'practitioner_id'      => $treatment['practitioner_id'] ?? $practitioner->getKey(),
                'visit_examination_id' => $attributes['visit_examination_id']
            ]);
            $treatment_models[] = $this->prepareStoreExaminationTreatment($treatment);
        }
        return new Collection($treatment_models);
    }

    public function calculatingTreatmentDebt(?array $attributes = null){
        $attributes ??= request()->all();
        if (!isset($attributes['visit_examination_id'])) throw new \Exception('visit_examination_id is required');

        $morphs      = [$this->VisitPatientModel()->getMorphClass()];
        $transaction = $this->TransactionModel()->with('paymentSummary')
            ->whereHasMorph('reference', $morphs, function ($query) use ($attributes) {
                $query->whereHas('visitExamination', function ($query) use ($attributes) {
                    $query->where('id', $attributes['visit_examination_id']);
                });
            })->first();
        if (!isset($transaction)) throw new \Exception('transaction is not found');

        $examination_treatments = $this->examinationTreatment()->with('treatment')
            ->where('visit_examination_id', $attributes['visit_examination_id'])
            ->whereDoesntHave('transactionItem', function ($query) use ($transaction) {
                $query->where('transaction_id', $transaction->getKey());
            })->get();
        $transaction_item_schema = $this->schemaContract('transaction_item');
        foreach ($examination_treatments as $examination_treatment) {
            $attributes['amount'] = $examination_treatment->treatment->price;

            $transaction_item_schema->prepareStoreTransactionItem([
                'transaction_id' => $transaction->getKey(),
                'item_type'      => $this->ServiceModel()->getMorphClass(),
                'item_id'        => $examination_treatment->treatment_id,
                'item_name'      => $examination_treatment->name,
                'payment_detail' => [
                    'payment_summary_id' => $transaction->paymentSummary->getKey(),
                    'qty'                => $attributes['qty'] ?? 1,
                    'amount'             => $attributes['amount'],
                    'tax'                => $attributes['tax'] ?? 0
                ]
            ]);
        }
    }

    public function prepareStoreExaminationTreatment(?array $attributes = null): Model{
        $this->initializeExamination($attributes);
        $guard = [
            'visit_examination_id'   => $attributes['visit_examination_id'],
            'examination_summary_id' => $attributes['examination_summary_id'] ?? static::$__examination_summary->getKey(),
            'patient_summary_id'     => $attributes['patient_summary_id'] ?? static::$__patient_summary->getKey(),
            'treatment_id'           => $attributes['treatment_id'],
            'reference_type'         => $attributes['reference_type'],
            'reference_id'           => $attributes['reference_id'],
        ];

        $add = [
            'name'  => $attributes['name'],
            'qty'   => $attributes['qty'] ?? 1,
            'price' => $attributes['price'] ?? null,
        ];

        if (isset($attributes['id'])) {
            $add   = $this->mergeArray($add, $guard);
            $guard = ['id' => $attributes['id']];
        }
        $examination_treatment = $this->examinationTreatment()->updateOrCreate($guard, $add);
        $examination_treatment->treatment_at = $attributes['treatment_at'] ?? null;

        if (static::$__visit_registration->medicService->flag === Label::RADIOLOGY) {
            $examination_treatment->interpretation = $attributes['interpretation'] ?? null;
            $examination_treatment->result = $attributes['result'] ?? null;
        }

        $examination_treatment->save();

        return static::$examination_treatment_model = $examination_treatment;
    }

    public function examinationTreatment(mixed $conditionals = null): Builder{
        return $this->generalSchemaModel($conditionals)->when(isset(request()->visit_examination_id), function ($query) {
            return $query->where('visit_examination_id', request()->visit_examination_id);
        });
    }
}
