<?php

namespace Hanafalah\ModuleExamination\Resources\Screening;

use Hanafalah\ModuleExamination\Resources\Form\ShowForm;

class ShowScreening extends ViewScreening
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
        ];
        
        $show = $this->resolveNow(new ShowForm($this));
        $arr = $this->mergeArray(parent::toArray($request), $show, $arr);
        return $arr;
    }
}
