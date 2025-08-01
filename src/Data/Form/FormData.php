<?php

namespace Hanafalah\ModuleExamination\Data\Form;

use Hanafalah\LaravelSupport\Data\UnicodeData;
use Hanafalah\ModuleExamination\Contracts\Data\Form\FormData as DataFormData;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Attributes\MapName;

class FormData extends UnicodeData implements DataFormData
{
    #[MapInputName('master_feature_id')]
    #[MapName('master_feature_id')]
    public mixed $master_feature_id = null;

    public static function before(array &$attributes){
        $attributes['flag'] ??= 'Form';
        parent::before($attributes);
    }
}
