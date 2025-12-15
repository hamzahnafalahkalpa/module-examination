<?php

namespace Hanafalah\ModuleExamination\Resources\Examination\Assessment\Prescription\BasicPrescription;

use Hanafalah\LaravelSupport\Resources\ApiResource;

class ViewBasicPrescription extends ApiResource
{
  /**
   * Transform the resource into an array.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
   */
  public function toArray(\Illuminate\Http\Request $request): array
  {
    $exam = $this->exam;
    // switch (true) {
    //   case isset($exam['medicine_prescription']):
    //     $exam = $exam['medicine_prescription'];
    //     $exam['type'] = 'MedicinePrescription';
    //   break;
    //   case isset($exam['medic_tool_prescription']):
    //     $exam = $exam['medic_tool_prescription'];
    //     $exam['type'] = 'MedicToolPrescription';
    //   break;
    //   case isset($exam['mix_prescription']):
    //     $exam = $exam['mix_prescription'];
    //     $exam['type'] = 'MixPrescription';
    //   break;
    // }
    $arr = [
      'id'                 => $this->id,
      'morph'              => $this->morph,
      'exam'               => $exam,
      'practitioner_evaluations' => $this->prop_practitioner_evaluations ?? [],
      'created_at'         => $this->created_at,
      'updated_at'         => $this->updated_at
    ];
    return $arr;
  }
}
