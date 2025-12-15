<?php

namespace Hanafalah\ModuleExamination\Resources\Examination\TrxMedicalLegalDocument;

use Hanafalah\ModuleExamination\Resources\Examination\Assessment\ViewAssessment;

class ViewTrxMedicalLegalDocument extends ViewAssessment
{
  /**
   * Transform the resource into an array.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
   */
  public function toArray(\Illuminate\Http\Request $request): array
  {
    $exam = $this->exam;
    $paths = &$exam['paths'];
    $paths ??= [];
    foreach ($paths as &$path) {
      $path = medical_legal_doc_url($path);
    }
    $arr = [
      'exam' => $exam
    ];
    $arr = $this->mergeArray(parent::toArray($request),$arr);
    return $arr;
  }
}
