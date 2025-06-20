<?php

namespace Hanafalah\ModuleExamiantion\Data;

use Hanafalah\LaravelSupport\Supports\Data;
use Hanafalah\ModuleExamination\Contracts\Data\FormData as DataFormData;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Attributes\MapName;

class FormData extends Data implements DataFormData
{
    #[MapInputName('id')]
    #[MapName('id')]
    public mixed $id = null;

    #[MapInputName('parent_id')]
    #[MapName('parent_id')]
    public mixed $parent_id = null;

    #[MapInputName('name')]
    #[MapName('name')]
    public string $name;

    #[MapInputName('flag')]
    #[MapName('flag')]
    public string $flag;

    #[MapInputName('label')]
    #[MapName('label')]
    public ?string $label = null;

    #[MapInputName('morph')]
    #[MapName('morph')]
    public ?string $morph = null;

    #[MapInputName('ordering')]
    #[MapName('ordering')]
    public int $ordering = 1;

    #[MapInputName('master_feature_id')]
    #[MapName('master_feature_id')]
    public mixed $master_feature_id = null;

    #[MapInputName('props')]
    #[MapName('props')]
    public ?array $props = null;

    public static function before(array &$attributes){
        $attributes['flag'] = 'Form';
    }
}
