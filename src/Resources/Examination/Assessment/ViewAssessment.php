<?php

namespace Hanafalah\ModuleExamination\Resources\Examination\Assessment;

use Hanafalah\LaravelSupport\Resources\ApiResource;

class ViewAssessment extends ApiResource
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
      'id'                 => $this->id,
      'morph'              => $this->morph,
      'exam'               => $this->exam,
      'practitioner_evaluations' => $this->prop_practitioner_evaluations ?? [],
      'is_settled'         => ($this->is_settled ?? 0) == 1,
      'created_at'         => $this->created_at,
      'updated_at'         => $this->updated_at
    ];
    return $arr;
  }
}
