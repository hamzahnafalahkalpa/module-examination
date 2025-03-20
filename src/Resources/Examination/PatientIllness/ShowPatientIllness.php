<?php

namespace Gii\ModuleExamination\Resources\Examination\PatientIllness;

class ShowPatientIllness extends ViewPatientIllness
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray(\Illuminate\Http\Request $request) : array {
      $arr = [
          'reference'      => $this->relationValdation('reference',function(){
            return $this->reference->toShowApi();
          }),
          'disease'        => $this->relationValdation('disease',function(){
            return $this->disease->toShowApi();
          }),
          'disease_name'              => $this->disease_name, 
          'classification_disease_id' => $this->classification_disease_id
       ];
       $arr = $this->mergeArray(parent::toArray($request), $arr);
       
       return $arr;
  }
}
