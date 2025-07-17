<?php

namespace Hanafalah\ModuleExamination\Resources\Examination\Prescription;

class ShowPrescription extends ViewPrescription
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
            'visit_examination' => $this->relationValdation('visitExamination', function () {
                return $this->visitExamination->toShowApi()->resolve();
            }),
            'examination_summary' => $this->relationValdation('examinationSummary', function () {
                return $this->examinationSummary->toShowApi()->resolve();
            })
        ];
        $arr = $this->mergeArray(parent::toArray($request), $arr);

        return $arr;
    }
}
