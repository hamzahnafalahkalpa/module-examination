<?php

namespace Gii\ModuleExamination\Resources\ExaminationStuff;

use Illuminate\Http\Request;
use Zahzah\LaravelSupport\Resources\ApiResource;

class ViewExaminationStuff extends ApiResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray(Request $request) : array{
      $arr = [
        'id'     => $this->id,
        'name'   => $this->name,
        'props'  => $this->getOriginal()['props'],
        'childs' => $this->relationValidation('childs',function(){
          $childs = $this->childs;
          return $childs->transform(function($child){
            return $child->toViewApi();
          });
        })
      ];
      
      return $arr;
  }
}