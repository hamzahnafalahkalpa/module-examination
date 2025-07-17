<?php

namespace Hanafalah\ModuleExamination\Resources\GcsStuff;

use Hanafalah\ModuleExamination\Resources\ExaminationStuff\ShowExaminationStuff;

class ShowGcsStuff extends ViewGcsStuff
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
