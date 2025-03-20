<?php

namespace Gii\ModuleExamination\Resources\Examination\VitalSign;

use Zahzah\LaravelSupport\Resources\ApiResource;

class ViewVitalSign extends ApiResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray(\Illuminate\Http\Request $request) : array {
       $arr = [
         'id'                 => $this->id,
         'patient_summary_id' => $this->patient_summary_id,
         'temperature'        => $this->temperature,
         'temperature_type'   => $this->temperature_type,
         'systole'            => $this->systole,
         'diastole'           => $this->diastole,
         'pulse_rate'         => $this->pulse_rate,
         'heart_rate'         => $this->heart_rate,
         'respiration_rate'   => $this->respiration_rate,
         'oxygen_saturation'  => $this->oxygen_saturation,
         'sars_cov2_rt'       => $this->sars_cov2_rt,
         'loc'                => $this->loc,
         'created_at'         => $this->created_at,
         'updated_at'         => $this->updated_at
       ];
       
       return $arr;
  }
}
