<?php

namespace Gii\ModuleExamination\Resources\Screening;

use Gii\ModuleExamination\Resources\Form\ViewForm;

class ViewScreening extends ViewForm
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray(\Illuminate\Http\Request $request) : array {
       $arr = [
           "forms" => $this->relationValidation("forms", function() {
               return $this->forms->transform(function($form) {
                    return new static($form);
               });
           }),
           'medic_services' => $this->relationValidation('hasServices',function(){
                return $this->hasServices->transform(function($service){
                    return $service->toViewApi();
                });
           })
       ];

       $arr = $this->mergeArray(parent::toArray($request), $arr);

       
       return $arr;
  }
}
