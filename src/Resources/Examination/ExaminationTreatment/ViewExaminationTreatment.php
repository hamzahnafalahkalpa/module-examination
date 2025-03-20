<?php

namespace Gii\ModuleExamination\Resources\Examination\ExaminationTreatment;

use Illuminate\Http\Request;
use Zahzah\LaravelSupport\Resources\ApiResource;

class ViewExaminationTreatment extends ApiResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray(Request $request) : array {
       $arr = [
          'id'                     => $this->id,
          'name'                   => $this->name,
          'visit_examination_id'   => $this->visit_examination_id,
          'examination_summary_id' => $this->examination_summary_id,
          'patient_summary_id'     => $this->patient_summary_id,
          'treatment_id'           => $this->treatment_id,
          'qty'                    => $this->qty,
          'created_at'             => $this->created_at,
          'updated_at'             => $this->updated_at
       ];
       
       return $arr;
  }
}
