<?php

namespace Hanafalah\ModuleExamination\Resources\ExaminationStuff;

use Hanafalah\LaravelSupport\Resources\Unicode\ShowUnicode;
use Illuminate\Http\Request;

class ShowExaminationStuff extends ViewExaminationStuff
{
  /**
   * Transform the resource into an array.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
   */
  public function toArray(Request $request): array
  {
    $arr = [
    ];
    $show = $this->resolveNow(new ShowUnicode($this));
    $arr = $this->mergeArray(parent::toArray($request), $show, $arr);
    return $arr;
  }
}
