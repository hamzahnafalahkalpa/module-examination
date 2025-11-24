<?php

namespace Hanafalah\ModuleExamination\Resources\Examination\PatientIllness;

class ShowPatientIllness extends ViewPatientIllness
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
      'reference'      => $this->relationValidation('reference', function () {
        return $this->reference->toShowApi()->resolve();
      },$this->prop_reference),
      'disease'        => $this->relationValidation('disease', function () {
        return $this->disease->toShowApi()->resolve();
      },$this->prop_disease),
      'disease_name'              => $this->disease_name,
      'classification_disease_id' => $this->classification_disease_id
    ];
    $arr = $this->mergeArray(parent::toArray($request), $arr);

    return $arr;
  }
}
