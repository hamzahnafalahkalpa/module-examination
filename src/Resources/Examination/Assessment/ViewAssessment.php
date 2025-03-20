<?php

namespace Gii\ModuleExamination\Resources\Examination\Assessment;

use Zahzah\LaravelSupport\Resources\ApiResource;

class ViewAssessment extends ApiResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray(\Illuminate\Http\Request $request) : array {
      $arr = [
        'id'                 => $this->id, 
        'patient_summary_id' => $this->patient_summary_id, 
        'morph'              => $this->morph,
        'exam'               => $this->{$this->morph.'Model'}()->getExamResults($this),
        'practitioners'      => $this->prop_practitioners ?? [],
        'is_settled'         => ($this->is_settled ?? 0) == 1,
        'created_at'         => $this->created_at,
        'updated_at'         => $this->updated_at
      ];
      return $arr;
  }
}
