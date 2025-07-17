<?php

namespace Hanafalah\ModuleExamination\Resources\ExaminationStuff;

use Illuminate\Http\Request;
use Hanafalah\LaravelSupport\Resources\Unicode\ViewUnicode;

class ViewExaminationStuff extends ViewUnicode
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
    $arr = $this->mergeArray(parent::toArray($request),$arr);
    return $arr;
  }
}
