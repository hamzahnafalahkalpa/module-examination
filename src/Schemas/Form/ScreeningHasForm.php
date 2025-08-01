<?php

namespace Hanafalah\ModuleExamination\Schemas\Form;

use Hanafalah\LaravelSupport\Supports\PackageManagement;
use Hanafalah\ModuleExamination\Contracts\Data\Form\ScreeningHasFormData;
use Hanafalah\ModuleExamination\Contracts\Schemas\Form\ScreeningHasForm as ContractsScreeningHasForm;
use Illuminate\Database\Eloquent\Model;

class ScreeningHasForm extends PackageManagement implements ContractsScreeningHasForm
{
    protected string $__entity = 'ScreeningHasForm';
    public $screening_has_form_model;

    public function prepareStoreScreeningHasForm(ScreeningHasFormData $screening_has_form_dto): Model{
        $add = [
            'form_id' => $screening_has_form_dto->form_id,
            'screening_id' => $screening_has_form_dto->screening_id
        ];
        if (isset($screening_has_form_dto->id)){
            $guard  = ['id' => $screening_has_form_dto->id];
            $create = [$guard,$add];
        }else{
            $create = [$add];
        }
        $screening_has_form = $this->usingEntity()->updateOrCreate(...$create);
        $this->fillingProps($screening_has_form,$screening_has_form_dto->props);
        $screening_has_form->save();
        return $this->screening_has_form_model = $screening_has_form;
    }
}
