<?php

namespace Hanafalah\ModuleExamination\Data;

use Hanafalah\LaravelSupport\Supports\Data;
use Hanafalah\ModuleExamination\Contracts\Data\PrescriptionData as DataPrescriptionData;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Attributes\MapName;

class PrescriptionData extends Data implements DataPrescriptionData
{
    #[MapInputName('medicine_prescription')]
    #[MapName('medicine_prescription')]
    public ?array $medicine_prescriptions = null;

    #[MapInputName('medic_tool_prescription')]
    #[MapName('medic_tool_prescription')]
    public ?array $medic_tool_prescription = null;

    #[MapInputName('mix_medicine_prescription')]
    #[MapName('mix_medicine_prescription')]
    public ?array $mix_medicine_prescription = null;
}