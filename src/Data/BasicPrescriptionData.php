<?php

namespace Hanafalah\ModuleExamination\Data;

use Hanafalah\LaravelSupport\Concerns\Support\HasRequestData;
use Hanafalah\ModuleExamination\Contracts\Data\BasicPrescriptionData as DataBasicPrescriptionData;
use Illuminate\Support\Str;

class BasicPrescriptionData extends TrxPrescriptionData implements DataBasicPrescriptionData
{
    use HasRequestData;

    public static function before(array &$attributes){
        $new = static::new();
        parent::before($attributes);
        $attribute_exam = &$attributes['exam'];
        $specific = $new->requestDTO(config('app.contracts.'.Str::studly($attribute_exam['type']).'Data'),$attributes);
        $attribute_exam = $specific->props['exam'];
        return $attributes;
    }
}