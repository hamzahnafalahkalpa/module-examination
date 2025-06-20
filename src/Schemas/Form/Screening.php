<?php

namespace Hanafalah\ModuleExamination\Schemas\Form;

use Hanafalah\ModuleExamination\Contracts\Data\Form\ScreeningData;
use Hanafalah\ModuleExamination\Contracts\Schemas\Form\Screening as ContractsScreening;
use Illuminate\Database\Eloquent\Model;

class Screening extends Form implements ContractsScreening
{
    protected string $__entity = 'Screening';
    public static $screening_model;

    public function prepareStoreScreening(ScreeningData $screening_dto): Model{
        $screening = $this->usingEntity()->updateOrCreate([
            'id'   => $screening_dto->id ?? null,
        ], [
            'label' => $screening_dto->label ?? null,
            'name'  => $screening_dto->name
        ]);

        $screening->modelHasService()->delete();
        // if (isset($attributes['medic_service'])) $attributes['medic_services'] = [$attributes['medic_service']];
        // if (isset($attributes['medic_services']) && count($attributes['medic_services']) > 0) {
        //     foreach ($attributes['medic_services'] as $medic_service) {
        //         $screening->modelHasService()->firstOrCreate([
        //             'service_id'   => $medic_service
        //         ]);
        //     }
        //     $services = $this->ServiceModel()->select('id', 'name')->whereIn('id', $attributes['medic_services'])->get()->toArray();
        //     $screening->setAttribute('medic_services', $services);
        // }

        // if (isset($attributes['forms']) && count($attributes['forms']) > 0) {
        //     $class = $this->ScreeningHasFormModel();

        //     $forms = $attributes['forms'];
        //     if (count($forms) > 0) {
        //         $keep = [];
        //         foreach ($forms as $form) {
        //             $keep[] = $form['id'];
        //             $screening_has_form = $class->firstOrCreate([
        //                 'form_id'      => $form['id'],
        //                 'screening_id' => $screening->getKey(),
        //             ]);
        //             $screening_has_form->ordering = $form['ordering'];
        //             $screening_has_form->save();
        //         }
        //         if (count($keep) > 0) {
        //             $class->where('screening_id', $screening->getKey())
        //                 ->whereNotIn('form_id', $keep)
        //                 ->delete();
        //         }
        //     } else {
        //         $screening->forms()->dispatch();
        //     }
        // }

        $this->fillingProps($screening,$screening_dto->props);
        $screening->save();
        return static::$screening_model = $screening;
    }
}
