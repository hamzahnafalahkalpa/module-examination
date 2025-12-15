<?php

namespace Hanafalah\ModuleExamination\Resources\Examination\Assessment\Diagnose\BasicDiagnose;

use Hanafalah\LaravelSupport\Resources\ApiResource;

class ViewBasicDiagnose extends ApiResource
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
    // switch (true) {
    //   case isset($exam['initial_diagnose']):
    //     $exam = $exam['initial_diagnose'];
    //     $exam['type'] = 'InitialDiagnose';
    //   break;
    //   case isset($exam['primary_diagnose']):
    //     $exam = $exam['primary_diagnose'];
    //     $exam['type'] = 'PrimaryDiagnose';
    //   break;
    //   case isset($exam['secondary_diagnose']):
    //     $exam = $exam['secondary_diagnose'];
    //     $exam['type'] = 'SecondaryDiagnose';
    //   break;
    // }
    $arr = [
      'id'                 => $this->id,
      'morph'              => $this->morph,
      'exam'               => $exam,
      'practitioner_evaluations' => $this->prop_practitioner_evaluations ?? [],
      'created_at'         => $this->created_at,
      'updated_at'         => $this->updated_at
    ];
    return $arr;
  }
}
