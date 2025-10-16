<?php

namespace Hanafalah\ModuleExamination\Resources\Form;

use Hanafalah\LaravelSupport\Resources\ApiResource;
use Hanafalah\LaravelSupport\Resources\Unicode\ViewUnicode;

class ViewForm extends ViewUnicode
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
      'examination_key'     => $this->examination_key,
    ];
    $arr = $this->mergeArray(parent::toArray($request),$arr);
    return $arr;
  }
}
