<?php

namespace Hanafalah\ModuleExamination\Resources\ScreeningHasForm;

use Hanafalah\LaravelSupport\Resources\ApiResource;

class ViewScreeningHasForm extends ApiResource
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
            'id' => $this->id,
            'form_id' => $this->form_id,
            'screening_id' => $this->screening_id,
            'form' => $this->prop_form
        ];
        return $arr;
    }
}
