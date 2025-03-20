<?php

namespace Gii\ModuleExamination\Resources\Form;

use Zahzah\LaravelSupport\Resources\ApiResource;

class ViewForm extends ApiResource
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
         'name'               => $this->name,
         'parent_id'          => $this->parent_id,
         'flag'               => $this->flag,
         'morph'              => $this->morph,
         'ordering'           => $this->ordering,
         'created_at'         => $this->created_at,
         'updated_at'         => $this->updated_at,
         'props'              => $this->getOriginal()['props']
       ];
       
       return $arr;
  }
}
