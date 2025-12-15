<?php

namespace Hanafalah\ModuleExamination\Resources\PatientSummary;

class ShowPatientSummary extends ViewPatientSummary
{
  /**
   * Transform the resource into an array.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
   */
  public function toArray(\Illuminate\Http\Request $request): array
  {
    if (isset(request()->show_emr) && request()->show_emr){
      $arr = [
        'emr' => $this->emr
      ];
    }else{
      $arr = [];
    }
    $arr = $this->mergeArray(parent::toArray($request),$arr);
    return $arr;
  }
}
