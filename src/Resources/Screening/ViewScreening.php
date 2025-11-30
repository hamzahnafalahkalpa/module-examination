<?php

namespace Hanafalah\ModuleExamination\Resources\Screening;

use Hanafalah\LaravelSupport\Resources\ApiResource;

class ViewScreening extends ApiResource
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
            'id'        => $this->id,
            'parent_id' => $this->parent_id,
            'name'      => $this->name,
            'flag'      => $this->flag,
            'label'     => $this->label,
            'service_ids' => $this->prop_service_ids,
            "screening_has_forms" => $this->relationValidation("screeningHasForms", function () {
                return $this->screeningHasForms->transform(function ($form) {
                    return $form->toViewApi()->resolve();
                });
            })
        ];
        return $arr;
    }
}
