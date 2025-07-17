<?php

namespace Hanafalah\ModuleExamination\Schemas\Examination;

use Hanafalah\ModuleExamination\Contracts;
use Hanafalah\ModuleExamination\Schemas\Examination;
use Hanafalah\ModuleExamination\Resources\Examination\Prescription\{
    ShowPrescription,
    ViewPrescription
};
use Hanafalah\ModuleMedicService\Enums\Label;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Hanafalah\ModulePharmacy\Enums\PharmacySaleVisitRegistration\{
    Activity,
    ActivityStatus
};

class Prescription extends Examination implements Contracts\Schemas\Examination\Prescription
{
    protected string $__entity = 'Prescription';
    public static $prescription_model;

    protected array $__resources = [
        'view' => ViewPrescription::class,
        'show' => ShowPrescription::class
    ];

    protected array $__cache = [
        'index' => [
            'name'      => 'prescription',
            'tags'      => ['examination', 'examination-prescription', 'examination-prescription-index'],
            'duration'  => 30
        ]
    ];

    public function prepareStoreMultiplePrescription(?array $attributes = null): Collection
    {
        $attributes ??= request()->all();
        $treatments   = $this->mustArray($attributes['treatment'] ?? $attributes['treatments']);
        $practitioner = $this->addPractitioner($attributes['visit_examination_id']);

        $prescription_models = [];
        foreach ($treatments as $treatment) {
            $treatment = $this->mergeArray($treatment, [
                'practitioner_id'      => $treatment['practitioner_id'] ?? $practitioner->getKey(),
                'visit_examination_id' => $attributes['visit_examination_id']
            ]);
            $prescription_models[] = $this->prepareStorePrescription($treatment);
        }
        return new Collection($prescription_models);
    }

    public function calculatingTreatmentDebt(?array $attributes = null)
    {
        $attributes ??= request()->all();
        if (!isset($attributes['visit_examination_id'])) throw new \Exception('visit_examination_id is required');

        $morphs = [$this->VisitPatientModel()->getMorphClass()];
        $transaction = $this->TransactionModel()->with('paymentSummary')
            ->whereHasMorph('reference', $morphs, function ($query) use ($attributes) {
                $query->whereHas('visitExamination', function ($query) use ($attributes) {
                    $query->where('id', $attributes['visit_examination_id']);
                });
            })->first();
        if (!isset($transaction)) throw new \Exception('transaction is not found');

        $prescriptions = $this->prescription()->with('treatment')
            ->where('visit_examination_id', $attributes['visit_examination_id'])
            ->whereDoesntHave('transactionItem', function ($query) use ($transaction) {
                $query->where('transaction_id', $transaction->getKey());
            })->get();
        $transaction_item_schema = $this->schemaContract('transaction_item');
        foreach ($prescriptions as $prescription) {
            $attributes['amount'] = $prescription->treatment->price;

            $transaction_item_schema->prepareStoreTransactionItem([
                'transaction_id' => $transaction->getKey(),
                'item_type'      => $this->ServiceModel()->getMorphClass(),
                'item_id'        => $prescription->treatment_id,
                'item_name'      => $prescription->name,
                'payment_detail' => [
                    'payment_summary_id' => $transaction->paymentSummary->getKey(),
                    'qty'                => $attributes['qty'] ?? 1,
                    'amount'             => $attributes['amount'],
                    'tax'                => $attributes['tax'] ?? 0
                ]
            ]);
        }
    }

    protected function toFrontline(?Model $visit_patient = null, ?Model $pharmacy_visit_registration = null): self
    {
        $pharmacy_visit_registration ??= $this->PharmacySaleVisitRegistrationModel()->find(static::$__visit_registration->getKey());
        $visit_patient               ??= $this->PharmacySaleModel()->find($pharmacy_visit_registration->visit_patient_id);
        $pharmacy_visit_registration->pushActivity(Activity::PHARMACY_FLOW->value, [ActivityStatus::PHARMACY_FLOW_QUEUE->value, ActivityStatus::PHARMACY_FLOW_FRONTLINE->value]);
        $this->appPharmacySaleSchema()->preparePushLifeCycleActivity($visit_patient, $pharmacy_visit_registration, 'PHARMACY_FLOW', [
            'PHARMACY_FLOW_FRONTLINE' => $pharmacy_visit_registration::$activityList[Activity::PHARMACY_FLOW->value . '_' . ActivityStatus::PHARMACY_FLOW_FRONTLINE->value]
        ]);
        return $this;
    }

    public function prepareStorePrescription(?array $attributes = null): Model
    {
        $attributes ??= request()->all();
        $attributes['is_for_pharmacy'] ??= false;
        if (!isset($attributes['card_stocks'])) throw new \Exception('card_stocks is required');
        if (count($attributes['card_stocks']) == 0) throw new \Exception('card_stocks need at least one item');

        if (isset($attributes['pharmacy_id'])) {
            $attributes['warehouse_id'] = $attributes['pharmacy_id'];
        }
        if (!isset($attributes['warehouse_id'])) throw new \Exception('warehouse_id is required');
        if (!isset($attributes['warehouse_type'])) {
            $warehouse = app(config('module-examination.warehouse'))->find($attributes['warehouse_id']);
            $attributes['warehouse_type'] = $warehouse->getMorphClass();
        }

        $visit_examination  = $this->VisitExaminationModel()->findOrFail($attributes['visit_examination_id']);
        $visit_registration = $visit_examination->visitRegistration;
        $visit_registration->load(['visitPatient' => fn($q) => $q->withoutGlobalScopes()]);
        $visit_patient      = $visit_registration->visitPatient;
        $attributes['patient_type_id'] ??= $visit_patient->prop_patienttype['id'] ?? $visit_registration->patient_type_id;
        if ($visit_registration->visit_patient_type == 'PharmacySale') {
            $attributes['pharmacy_sale_id'] = $visit_patient->getKey();
        }
        $attributes['morphs'] = ['*'];
        if (!isset($attributes['pharmacy_sale_id'])) {
            $pharmacy_visit_registration = $this->createVisitRegistration($visit_patient, $visit_registration, $visit_examination, $attributes);
            if ($pharmacy_visit_registration->wasRecentlyCreated) {
                $pharmacy_visit_registration = $this->PharmacySaleVisitRegistrationModel()->findOrFail($pharmacy_visit_registration->getKey());
                $this->toFrontline($pharmacy_visit_registration->visitPatient, $pharmacy_visit_registration);
            }

            $pharmacy_sale = $pharmacy_visit_registration->visitPatient;
        } else {
            $pharmacy_sale = $this->PharmacySaleModel()->findOrFail($attributes['pharmacy_sale_id']);
            $pharmacy_visit_registration = $pharmacy_sale->visitRegistration;
        }

        $pharmacy_transaction = $pharmacy_sale->transaction;
        if (!isset($attributes['pharmacy_sale_id']) && $pharmacy_visit_registration->wasRecentlyCreated) {
            $pharmacy_transaction->parent_id = $visit_patient->transaction->getKey();
            $pharmacy_transaction->save();
        }
        if (isset($pharmacy_sale->reference_type) && !$attributes['is_for_pharmacy']) {
            $this->updatePharmacyPaymentSummary($pharmacy_sale, $visit_patient->paymentSummary);
        }

        $guard = [
            'reference_type'         => $attributes['reference_type'],
            'reference_id'           => $attributes['reference_id'],
            'visit_examination_id'   => $attributes['visit_examination_id'],
            'examination_summary_id' => $attributes['examination_summary_id'],
            'patient_summary_id'     => $attributes['patient_summary_id'],
        ];

        $attributes['price'] ??= 0;
        $add = [
            'qty'   => $attributes['qty'],
            'name'  => $attributes['name'],
            'price' => $attributes['price'] ?? 0,
            'cogs'  => $attributes['cogs'] ?? 0
        ];
        $prescription = $this->PrescriptionModel()->updateOrCreate($guard, $add);
        if (!$attributes['is_for_pharmacy']) {
            $this->cardStockProcess($attributes, $pharmacy_transaction);
            $visit_examination_id = $pharmacy_visit_registration->visitExamination->getKey();
            $assessment = $this->AssessmentModel()->with('child')->findOrFail($attributes['assessment_id']);
            if (isset($assessment->card_stock)) {
                $assessment->setAttribute('card_stock', $attributes['card_stocks'][0]);
            } else {
                $assessment->setAttribute('card_stocks', $attributes['card_stocks']);
            }
            $assessment->qty         = $attributes['qty'];
            $assessment->price       = $attributes['price'];
            $assessment->total_debt  = $attributes['price'] * $attributes['qty'];
            $assessment->save();
            if ($visit_registration->visit_patient_type != 'PharmacySale') {
                $new_assessment = $assessment->child ?? $assessment->replicate();

                if ($prescription->reference_type == $this->MixMedicinePrescriptionModel()->getMorphClass()) {
                    $card_stock_attr = $attributes['card_stocks'];
                    $new_assessment->setAttribute('card_stocks', $card_stock_attr);
                } else {
                    $card_stock_attr = $attributes['card_stocks'][0];
                    $new_assessment->setAttribute('card_stock', $card_stock_attr);
                }
                if (!isset($assessment->child)) {
                    $new_assessment->parent_id = $assessment->getKey();
                    $new_assessment->visit_examination_id = $visit_examination_id;
                    $new_assessment->examination_summary_id = static::$__examination_summary->getKey();
                    $new_assessment->save();
                    $attributes['pharmacy_sale_id']       = $pharmacy_sale->getKey();
                    $attributes['reference_id']           = $new_assessment->getKey();
                    $attributes['reference_type']         = $new_assessment->morph;
                    $attributes['warehouse_id']         ??= request()->pharmacy_id ?? request()->warehouse_id ?? null;
                    $attributes['assessment_id']        ??= $new_assessment->getKey();
                    $attributes['visit_examination_id']   = $visit_examination_id;
                    $attributes['patient_id']             = $visit_patient->patient_id;
                    $attributes['is_for_pharmacy']        = true;
                    $this->prepareStorePrescription($attributes);
                } else {
                    $guard = [
                        'reference_type'         => $new_assessment->morph,
                        'reference_id'           => $new_assessment->getKey(),
                        'visit_examination_id'   => $new_assessment->visit_examination_id,
                        'examination_summary_id' => $new_assessment->examination_summary_id,
                        'patient_summary_id'     => $new_assessment->patient_summary_id
                    ];
                    $prescription = $this->PrescriptionModel()->updateOrCreate($guard, $add);
                    $new_assessment->qty         = $attributes['qty'];
                    $new_assessment->price       = $attributes['price'];
                    $new_assessment->total_debt  = $attributes['price'] * $attributes['qty'];
                    $new_assessment->save();
                    $this->cardStockProcess($attributes, $pharmacy_transaction);
                }
            }
        }

        return static::$prescription_model = $prescription;
    }

    protected function updatePharmacyPaymentSummary(Model &$pharmacy_sale, Model $visit_patient_payment)
    {
        $payment_summary            = $pharmacy_sale->paymentSummary;
        $payment_summary->name      = 'Total Tagihan Resep';
        $payment_summary->parent_id = $visit_patient_payment->getKey();
        $payment_summary->save();
    }

    protected function createVisitRegistration(Model $visit_patient, Model $visit_registration, Model $visit_examination, array $attributes): Model
    {
        return $this->schemaContract('visit_registration')->prepareStoreVisitRegistration([
            'patient_id'                => $visit_patient->patient_id,
            'parent_id'                 => $visit_registration->getKey(),
            'visit_patient'             => [
                'flag'                  => $this->PharmacySaleModel()::PHARMACY_SALE_VISIT,
                'parent_id'             => $visit_patient->getKey(),
                'payer_id'              => $visit_patient->prop_payer['id'] ?? null,
                'agent_id'              => $visit_patient->prop_agent['id'] ?? null,
                'reported_at'           => null,
                'reference_id'          => $visit_examination->getKey(),
                'reference_type'        => $visit_examination->getMorphClass()
            ],
            'patient_type_id'   => $attributes['patient_type_id'],
            'medic_service_id'  => $this->MedicServiceModel()->flagIn(Label::PHARMACY->value)->where('name', 'Instalasi Farmasi')->firstOrFail()->service->getKey(),
            'medic_services'    => []
        ]);
    }

    protected function cardStockProcess(&$attributes, $pharmacy_transaction)
    {
        $card_stock_schema = $this->schemaContract('card_stock');
        foreach ($attributes['card_stocks'] as &$item) {
            $stock_movement = &$item['stock_movement'];
            $stock_movement['id']              = $item['stock_movement']['id'] ?? null;
            $stock_movement['direction']       = $this->MainMovementModel()::OUT;
            $stock_movement['warehouse_id']    = $attributes['warehouse_id'];
            $stock_movement['warehouse_type']  = $attributes['warehouse_type'] ?? null;
            $card_stock_model = $card_stock_schema->prepareStoreCardStock([
                'item_id'             => $item['item_id'],
                'parent_id'           => $item['parent_id'] ?? null,
                'transaction_id'      => $pharmacy_transaction->getKey(),
                'stock_movement'      => $stock_movement
            ]);
            if (!isset($stock_movement['id'])) {
                $card_stock_model->refresh();
                $card_stock_model->load(['stockMovement' => fn($q) => $q->whereNull('parent_id')]);
                $stock_movement['id'] = $card_stock_model->stockMovement->getKey();
            }
            $item['id'] = $card_stock_model->getKey();
        }
    }

    public function prepareViewPrescriptionList(?array $attributes = null): Collection
    {
        $attributes ??= request()->all();

        return static::$prescription_model = $this->cacheWhen(!$this->isSearch(), $this->__cache['index'], function () use ($attributes) {
            return $this->prescription()
                ->when(isset($attributes['visit_examination_id']), function ($query) use ($attributes) {
                    $query->where('visit_examination_id', $attributes['visit_examination_id']);
                })
                ->orderBy('created_at', 'desc')->get();
        });
    }

    public function viewPrescriptionList(): array
    {
        return $this->transforming($this->__resources['view'], function () {
            return $this->prepareViewPrescriptionList();
        });
    }

    public function prescription(mixed $conditionals = null): Builder
    {
        $this->booting();
        return $this->PrescriptionModel()->withParameters()->conditionals($conditionals);
    }
}
