<?php

namespace Hanafalah\ModuleExamination\Resources\FormHasSurvey;

use Hanafalah\LaravelSupport\Resources\ApiResource;

class ViewFormHasSurvey extends ApiResource
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
      'id' => $this->id,
      'form_id' => $this->form_id,
      'survey_id' => $this->survey_id,
      'survey' => $this->prop_survey
    ];
    return $arr;
  }
}
