<?php

namespace Hanafalah\ModuleExamination\Resources\Examination\Prescription;

use Illuminate\Http\Request;
use Hanafalah\LaravelSupport\Resources\ApiResource;

class ViewPrescription extends ApiResource
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
      'visit_examination_id'   => $this->visit_examination_id,
      'examination_summary_id' => $this->examination_summary_id,
      'patient_summary_id'     => $this->patient_summary_id,
      'prescription_no'        => $this->prescription_no,
      'iter'                   => $this->iter,
      'indication'             => $this->indication
    ];

    return $arr;
  }
}
