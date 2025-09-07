<?php

namespace Hanafalah\ModuleExamination\Resources\Examination\Assessment\Treatment\TrxTreatment;

use Hanafalah\ModuleExamination\Resources\Examination\Assessment\ViewAssessment;

class ViewTrxTreatment extends ViewAssessment
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
    $arr = [
      'id'                 => $this->id,
      'morph'              => $this->morph,
      'exam'               => [
        'name'             => $exam['name'],
        'treatment_id'     => $exam['treatment_id'],
        'service_label'    => $exam['service_label']
      ],
      'practitioners'      => $this->prop_practitioners ?? [],
      'is_settled'         => ($this->is_settled ?? 0) == 1,
      'created_at'         => $this->created_at,
      'updated_at'         => $this->updated_at
    ];
    return $arr;
  }
}
