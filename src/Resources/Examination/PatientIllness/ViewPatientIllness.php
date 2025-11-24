<?php

namespace Hanafalah\ModuleExamination\Resources\Examination\PatientIllness;

use Illuminate\Http\Request;
use Hanafalah\LaravelSupport\Resources\ApiResource;

class ViewPatientIllness extends ApiResource
{
  /**
   * Transform the resource into an array.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
   */
  public function toArray(Request $request): array
  {
    $arr = [
      'id'                     => $this->id,
      'name'                   => $this->name,
      'examination_summary_id' => $this->examination_summary_id,
      'patient_summary_id'     => $this->patient_summary_id,
      'disease_type'           => $this->disease_type,
      'patient'                => $this->relationValidation('patient', function () {
        return $this->patient->toShowApi()->resolve();
      },$this->prop_patient),
      'reference'              => $this->relationValidation('reference', function () {
        return $this->reference->toViewApi()->resolve();
      }),
      'disease'        => $this->relationValidation('disease', function () {
        return $this->disease->toShowApi()->resolve();
      },$this->prop_disease),
      'classification_disease'        => $this->relationValidation('classificationDisease', function () {
        return $this->classificationDisease->toShowApi()->resolve();
      },$this->prop_classification_disease),
      'created_at'   => $this->created_at,
      'updated_at'   => $this->updated_at
    ];

    return $arr;
  }
}
