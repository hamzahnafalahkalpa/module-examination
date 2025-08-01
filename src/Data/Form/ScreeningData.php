<?php

namespace Hanafalah\ModuleExamination\Data\Form;

use Hanafalah\ModuleExamination\Contracts\Data\Form\ScreeningData as DataScreeningData;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Attributes\MapName;

class ScreeningData extends FormData implements DataScreeningData
{
    #[MapInputName('service_ids')]
    #[MapName('service_ids')]
    public ?array $service_ids = null;

    #[MapInputName('screening_has_forms')]
    #[MapName('screening_has_forms')]
    #[DataCollectionOf(ScreeningHasFormData::class)]
    public ?array $screening_has_forms = null;

    public static function before(array &$attributes){
        $attributes['flag'] ??= 'Screening';
        parent::before($attributes);
    }
}
