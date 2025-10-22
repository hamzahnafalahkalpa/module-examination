<?php

namespace Hanafalah\ModuleExamination\Resources\Examination\Assessment\Diagnose\PatientFamilyIllness;

use Hanafalah\LaravelSupport\Resources\ApiResource;

class ViewPatientFamilyIllness extends ApiResource
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
    switch (true) {
      case isset($exam['family_illness']):
        $exam = $exam['family_illness'];
        $exam['type'] = 'FamilyIllness';
      break;
      case isset($exam['history_illness']):
        $exam = $exam['history_illness'];
        $exam['type'] = 'HistoryIllness';
      break;
    }
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
