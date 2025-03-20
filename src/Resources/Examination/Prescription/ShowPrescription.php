<?php

namespace Gii\ModuleExamination\Resources\Examination\Prescription;

class ShowPrescription extends ViewPrescription
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray(\Illuminate\Http\Request $request) : array {
      $arr = [
          'visit_examination' => $this->relationValdation('visitExamination',function(){
              return $this->visitExamination->toShowApi();
          }),
          'examination_summary' => $this->relationValdation('examinationSummary',function(){
              return $this->examinationSummary->toShowApi();
          })
       ];
       $arr = $this->mergeArray(parent::toArray($request), $arr);
       
       return $arr;
  }
}
