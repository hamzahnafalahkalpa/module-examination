<?php

namespace Hanafalah\ModuleExamination\Resources\MasterVaccine;

use Hanafalah\LaravelSupport\Resources\ApiResource;

class ViewMasterVaccine extends ApiResource
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
      'id'           => $this->id,
      'name'         => $this->name,
      'update_able'  => $this->update_able,
      'created_at'   => $this->created_at,
      'updated_at'   => $this->updated_at,
      'props'        => $this->getPropsData()
    ];

    return $arr;
  }
}
