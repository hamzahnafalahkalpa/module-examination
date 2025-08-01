<?php

namespace Hanafalah\ModuleExamination\Data;

use Hanafalah\LaravelSupport\Supports\Data;
use Hanafalah\ModuleExamination\Contracts\Data\AssessmentData as DataAssessmentData;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Attributes\MapName;

class AssessmentPropsData extends Data implements DataAssessmentData
{
    #[MapInputName('exam')]
    #[MapName('exam')]
    public ?array $exam = null;

    #[MapInputName('props')]
    #[MapName('props')]
    public ?array $props = null;
}