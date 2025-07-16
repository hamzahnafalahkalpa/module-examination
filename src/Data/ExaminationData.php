<?php

namespace Hanafalah\ModuleExamination\Data;

use Hanafalah\LaravelSupport\Supports\Data;
use Hanafalah\ModuleExamination\Contracts\Data\ExaminationData as DataExaminationData;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Attributes\MapName;

class ExaminationData extends Data implements DataExaminationData
{
    #[MapInputName('visit_examination_id')]
    #[MapName('visit_examination_id')]
    public mixed $visit_examination_id;

    #[MapInputName('visit_examination_model')]
    #[MapName('visit_examination_model')]
    public ?object $visit_examination_model = null;

    #[MapInputName('visit_registration_model')]
    #[MapName('visit_registration_model')]
    public ?object $visit_registration_model = null;

    #[MapInputName('visit_patient_model')]
    #[MapName('visit_patient_model')]
    public ?object $visit_patient_model = null;

    #[MapInputName('patient_model')]
    #[MapName('patient_model')]
    public ?object $patient_model = null;

    #[MapInputName('screening_ids')]
    #[MapName('screening_ids')]
    public ?array $screening_ids = null;

    #[MapInputName('assessment')]
    #[MapName('assessment')]
    public null|array|object $assessment = null;

    public static function after(self $data): self{
        $new = self::new();

        $data->screening_ids ??= [];

        $data->visit_examination_model = $visit_examination = $new->VisitExaminationModel()->with([
            'visitRegistration.visitPatient.patient'
        ])->findOrFail($data->visit_examination_id);    
        $data->visit_registration_model = $visit_registration = $visit_examination->visitRegistration;
        $data->visit_patient_model = $visit_patient = $visit_registration->visitPatient;
        $data->patient_model = $visit_patient->patient;
            
        $data->screening_ids = array_column($visit_examination->screenings ?? [], 'id');

        if (isset($data->assessment) && is_array($data->assessment)){
            $data->assessment = json_decode(json_encode($data->assessment));
        }
        return $data;
    }
}