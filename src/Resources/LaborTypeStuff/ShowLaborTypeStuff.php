<?php

namespace Hanafalah\ModuleExamination\Resources\LaborTypeStuff;

use Hanafalah\ModuleExamination\Resources\ExaminationStuff\ShowExaminationStuff;

class ShowLaborTypeStuff extends ViewLaborTypeStuff
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
    $show = $this->resolveNow(new ShowExaminationStuff($this));
    $arr = $this->mergeArray(parent::toArray($request),$show,$arr);
    return $arr;
  }
}
