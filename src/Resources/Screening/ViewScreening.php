<?php

namespace Hanafalah\ModuleExamination\Resources\Screening;

use Hanafalah\ModuleExamination\Resources\Form\ViewForm;

class ViewScreening extends ViewForm
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray(\Illuminate\Http\Request $request): array
    {
        $arr = [
            "screening_has_forms" => $this->relationValidation("screeningHasForms", function () {
                return $this->screeningHasForms->transform(function ($form) {
                    return $form->toViewApi()->resolve();
                });
            }),
            'services' => $this->relationValidation('hasServices', function () {
                return $this->hasServices->transform(function ($service) {
                    return $service->toViewApi();
                });
            })
        ];
        $arr = $this->mergeArray(parent::toArray($request), $arr);
        return $arr;
    }
}
