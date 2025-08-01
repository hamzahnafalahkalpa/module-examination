<?php

namespace Hanafalah\ModuleExamination\Schemas\Form;

use Hanafalah\ModuleExamination\Contracts\Data\Form\ScreeningData;
use Hanafalah\ModuleExamination\Contracts\Schemas\Form\Screening as ContractsScreening;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Screening extends Form implements ContractsScreening
{
    protected string $__entity = 'Screening';
    public $screening_model;

    public function prepareStoreScreening(ScreeningData $screening_dto): Model{
        $screening = $this->prepareStoreUnicode($screening_dto);
        if (isset($screening_dto->service_ids) && count($screening_dto->service_ids) > 0) {
            $keep = [];
            foreach ($screening_dto->service_ids as $service_id) {
                $model_has_service_model = $this->schemaContract('model_has_service')->prepareStoreModelHasService(
                    $this->requestDTO(app(config('app.contracts.ModelHasServiceData')),[
                        'model_type' => $screening->getMorphClass(),
                        'model_id'   => $screening->getKey(),
                        'service_id' => $service_id
                    ])
                );
                $keep[] = $model_has_service_model->getKey();
            }
            if (count($keep) > 0){
                $screening->modelHasService()->whereNotIn('id', $keep)->delete();
            }
        }else{
            $screening->modelHasService()->delete();
        }
        if (isset($screening_dto->screening_has_forms) && count($screening_dto->screening_has_forms) > 0) {
            $screening_has_forms = &$screening_dto->screening_has_forms;
            if (count($screening_has_forms) > 0) {
                $keep = [];
                $schema = $this->schemaContract('screening_has_form');
                foreach ($screening_has_forms as $form) {
                    $form->screening_id = $screening->getKey();
                    $screening_has_form = $schema->prepareStoreScreeningHasForm($form);
                    $keep[] = $screening_has_form->getKey();
                }
                if (count($keep) > 0) {
                    $this->ScreeningHasFormModel()->where('screening_id', $screening->getKey())
                        ->whereNotIn('id', $keep)
                        ->delete();
                }
            } else {
                $screening->forms()->dispatch();
            }
        }

        $this->fillingProps($screening,$screening_dto->props);
        $screening->save();
        return $this->screening_model = $screening;
    }

    public function screening(mixed $conditionals = null): Builder{
        return $this->form($conditionals);
    }
}
