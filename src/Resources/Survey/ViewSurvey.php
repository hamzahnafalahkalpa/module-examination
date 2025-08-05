<?php

namespace Hanafalah\ModuleExamination\Resources\Survey;

use Hanafalah\LaravelSupport\Resources\Unicode\ViewUnicode;

class ViewSurvey extends ViewUnicode
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
      'id'        => $this->id,
      'name'      => $this->name,
      'label'     => $this->label,
      'ordering'  => $this->ordering,
      'dynamic_forms' => $this->dynamic_forms
    ];
    return $arr;
  }
}
