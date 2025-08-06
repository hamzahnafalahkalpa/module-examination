<?php

namespace Hanafalah\ModuleExamination\Resources\BirthHelperStuff;

use Hanafalah\ModuleExamination\Resources\ExaminationStuff\ViewExaminationStuff;

class ViewBirthHelperStuff extends ViewExaminationStuff
{
  /**
   * Transform the resource into an array.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
   */
  public function toArray(\Illuminate\Http\Request $request): array
  {
    $arr = [];
    $arr = $this->mergeArray(parent::toArray($request),$arr);
    return $arr;
  }
}
