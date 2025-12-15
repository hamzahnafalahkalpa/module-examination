<?php

namespace Hanafalah\ModuleExamination\Data;

use Hanafalah\LaravelSupport\Supports\Data;
use Hanafalah\ModuleExamination\Contracts\Data\PatientSummaryData as DataPatientSummaryData;

class PatientSummaryData extends Data implements DataPatientSummaryData
{
    #[MapInputName('id')]
    #[MapName('id')]
    public mixed $id = null;

    #[MapInputName('parent_id')]
    #[MapName('parent_id')]
    public mixed $parent_id = null;

    #[MapInputName('patient_id')]
    #[MapName('patient_id')]
    public mixed $patient_id = null;

    #[MapInputName('patient_model')]
    #[MapName('patient_model')]
    public ?object $patient_model = null;

    #[MapInputName('reference_type')]
    #[MapName('reference_type')]
    public ?string $reference_type = null;

    #[MapInputName('reference_id')]
    #[MapName('reference_id')]
    public mixed $reference_id = null;

    #[MapInputName('reference_model')]
    #[MapName('reference_model')]
    public ?object $reference_model = null;

    #[MapInputName('assessment_model')]
    #[MapName('assessment_model')]
    public ?object $assessment_model = null;

    #[MapInputName('props')]
    #[MapName('props')]
    public ?array $props = null;
}