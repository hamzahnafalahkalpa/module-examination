<?php

namespace Hanafalah\ModuleExamination\Resources\Form;

use Hanafalah\LaravelSupport\Resources\Unicode\ShowUnicode;

class ShowForm extends ViewForm
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
      'form_has_survey' => $this->relationValidation('formHasSurvey', function () {
        return $this->formHasSurvey->toViewApi()->resolve();
      }),
    ];
    $show = $this->resolveNow(new ShowUnicode($this));
    $arr = $this->mergeArray(parent::toArray($request),$show,$arr);
    return $arr;
  }
}
