<?php

namespace Hanafalah\ModuleExamination\Data;

use Hanafalah\LaravelSupport\Concerns\Support\HasRequestData;
use Hanafalah\LaravelSupport\Supports\Data;
use Hanafalah\ModuleExamination\Contracts\Data\ExaminationData as DataExaminationData;
use Hanafalah\ModulePatient\Data\PractitionerEvaluationData;
use Illuminate\Database\Eloquent\Model;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Attributes\MapName;

class ExaminationData extends Data implements DataExaminationData
{
    use HasRequestData;

    #[MapInputName('in_view_response')]
    #[MapName('in_view_response')]
    public ?bool $in_view_response = false;

    #[MapInputName('response')]
    #[MapName('response')]
    public ?array $response = [];

    #[MapInputName('visit_examination_id')]
    #[MapName('visit_examination_id')]
    public mixed $visit_examination_id;

    #[MapInputName('visit_examination_model')]
    #[MapName('visit_examination_model')]
    public ?Model $visit_examination_model = null;

    #[MapInputName('visit_registration_model')]
    #[MapName('visit_registration_model')]
    public ?Model $visit_registration_model = null;

    #[MapInputName('visit_patient_model')]
    #[MapName('visit_patient_model')]
    public ?Model $visit_patient_model = null;  

    #[MapInputName('patient_model')]
    #[MapName('patient_model')]
    public ?object $patient_model = null;

    #[MapInputName('patient_summary_id')]
    #[MapName('patient_summary_id')]
    public mixed $patient_summary_id = null;

    #[MapInputName('patient_summary_model')]
    #[MapName('patient_summary_model')]
    public ?object $patient_summary_model = null;

    #[MapInputName('examination_summary_id')]
    #[MapName('examination_summary_id')]
    public mixed $examination_summary_id = null;

    #[MapInputName('examination_summary_model')]
    #[MapName('examination_summary_model')]
    public ?object $examination_summary_model = null;

    #[MapInputName('visit_patient_payment_summary_model')]
    #[MapName('visit_patient_payment_summary_model')]
    public ?object $visit_patient_payment_summary_model = null;

    #[MapInputName('visit_registration_payment_summary_model')]
    #[MapName('visit_registration_payment_summary_model')]
    public ?object $visit_registration_payment_summary_model = null;

    #[MapInputName('practitioner_evaluations')]
    #[MapName('practitioner_evaluations')]
    #[DataCollectionOf(PractitionerEvaluationData::class)]
    public null|object|array $practitioner_evaluations = null;

    #[MapInputName('screening_ids')]
    #[MapName('screening_ids')]
    public ?array $screening_ids = null;

    #[MapInputName('assessment')]
    #[MapName('assessment')]
    public null|array|object $assessment = null;

    #[MapInputName('support')]
    #[MapName('support')]
    public null|array|object $support = null;

    #[MapInputName('medical_legal_doc')]
    #[MapName('medical_legal_doc')]
    public null|array|object $medical_legal_doc = null;

    #[MapInputName('treatments')]
    #[MapName('treatments')]
    public ?array $treatments = null;

    #[MapInputName('prescription')]
    #[MapName('prescription')]
    public null|array|object $prescription = null;

    #[MapInputName('props')]
    #[MapName('props')]
    public ?array $props = null;

    public static function after(self $data): self{
        $new = self::new();

        $data->screening_ids ??= [];
        $data->in_view_response ??= true;
        if (isset($data->visit_examination_id) || isset($data->visit_examination_model)){
            $data->visit_examination_model ??=  $new->VisitExaminationModel()->with([
                'visitRegistration' => function($query){
                    $query->with([
                        'transaction',
                        'visitPatient' => function($query){
                            $query->with([
                                'transaction',
                                'patient.patientSummary'
                            ]);                            
                        }
                    ]);
                }
            ])->findOrFail($data->visit_examination_id);    
            $data->visit_examination_id ??= $data->visit_examination_model->getKey();
            $visit_examination = $data->visit_examination_model;
            $data->visit_registration_model = $visit_registration = $visit_examination->visitRegistration;
            $data->visit_patient_model = $visit_patient = $visit_registration->visitPatient;
            $data->patient_model = $visit_patient->patient;
            $data->patient_summary_model = $data->patient_model->patientSummary;
            $data->patient_summary_id = $data->patient_summary_model->getKey();
            $data->screening_ids = array_column($visit_examination->screenings ?? [], 'id');
        }
        $data->response ??= [];
        return $data;
    }
}
    