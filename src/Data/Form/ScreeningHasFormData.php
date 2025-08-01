<?php

namespace Hanafalah\ModuleExamination\Data\Form;

use Hanafalah\LaravelSupport\Supports\Data;
use Hanafalah\ModuleExamination\Contracts\Data\Form\ScreeningHasFormData as DataScreeningHasFormData;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Attributes\MapName;

class ScreeningHasFormData extends Data implements DataScreeningHasFormData
{
    #[MapInputName('id')]
    #[MapName('id')]
    public mixed $id = null;

    #[MapInputName('form_id')]
    #[MapName('form_id')]
    public mixed $form_id;
    
    #[MapInputName('screening_id')]
    #[MapName('screening_id')]
    public mixed $screening_id = null;

    #[MapInputName('props')]
    #[MapName('props')]
    public ?array $props = null;

    public static function after(self $data):self{
        $new = static::new();

        $props = &$data->props;

        $form = $new->FormModel();
        if (isset($data->form_id)) $form = $form->findOrFail($data->form_id);
        $props['prop_form'] = $form->toViewApi()->only(['id','name','flag','label']);
        
        return $data;
    }
}