<?php

namespace Hanafalah\ModuleExamination\Resources\Examination\Assessment;

class ShowAssessment extends ViewAssessment
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
      'patient_summary' => $this->relationValidation('patientSummary', function () {
        return $this->patientSummary->toViewApi()->resolve();
      })
    ];
    $arr = $this->mergeArray(parent::toArray($request), $arr);

    return $arr;
  }
}
