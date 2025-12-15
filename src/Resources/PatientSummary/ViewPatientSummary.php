<?php

namespace Hanafalah\ModuleExamination\Resources\PatientSummary;

use Hanafalah\ModuleSummary\Resources\Summary\ViewSummary;
use Illuminate\Support\Str;

class ViewPatientSummary extends ViewSummary
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
      'id'                => $this->id, 
      'parent_id'          => $this->parent_id, 
      'patient_id'         => $this->patient_id, 
      'reference_type'     => $this->reference_type, 
      'reference_id'       => $this->reference_id, 
    ];
    $template = config('module-examination.patient_summary_template',[]);

    foreach($template as $key => $value){
      $arr[$key] = $this->{$key} ?? (Str::plural($key) == $key ? [] : null);
    } 
    return $arr;
  }
}
