<?php

namespace Hanafalah\ModuleExamination\Resources\Soap;

use Hanafalah\LaravelSupport\Resources\ApiResource;

class ViewSoap extends ApiResource
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
            'id'        => $this->id,
            'name'      => $this->name,
            'flag'      => $this->flag,
            'label'     => $this->label,
            'subjectives' => $this->relationValidation('subjectives',function(){
                return $this->subjectives->transform(function($subjective){
                    return $subjective->toViewApi()->resolve();
                });
            }),
            'assessments' => $this->relationValidation('assessments',function(){
                return $this->assessments->transform(function($assessment){
                    return $assessment->toViewApi()->resolve();
                });
            }),
            'objectives' => $this->relationValidation('objectives',function(){
                return $this->objectives->transform(function($objectuve){
                    return $objectuve->toViewApi()->resolve();
                });
            }),
            'plans' => $this->relationValidation('plans',function(){
                return $this->plans->transform(function($plan){
                    return $plan->toViewApi()->resolve();
                });
            })
        ];
        return $arr;
    }
}
