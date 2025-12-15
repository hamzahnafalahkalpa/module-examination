<?php

namespace Hanafalah\ModuleExamination\Schemas;

use Hanafalah\LaravelSupport\Supports\PackageManagement;
use Illuminate\Database\Eloquent\Model;
use Hanafalah\ModuleExamination\Contracts\Data\PatientSummaryData;
use Hanafalah\ModuleExamination\Contracts\Schemas\PatientSummary as ContractsPatientSummary;

class PatientSummary extends PackageManagement implements ContractsPatientSummary
{
    protected string $__entity = 'PatientSummary';
    public $patient_summary_model;

    protected array $__cache = [
        'index' => [
            'name'     => 'patient_summary',
            'tags'     => ['patient_summary', 'patient_summary-index'],
            'forever'  => 24*7*60
        ]
    ];

    public function prepareStorePatientSummary(PatientSummaryData $patient_summary_dto): Model{     
        $add = [
            'patient_id' => $patient_summary_dto->patient_id,            
        ];
        if (!isset($patient_summary_dto->id) && !isset($patient_summary_dto->patient_id)){
            $guard = [
                'reference_type' => $patient_summary_dto->reference_type,
                'reference_id'   => $patient_summary_dto->reference_id
            ];
            $create = [$guard,$add];

            $patient_summary_template = $this->getPatientSummaryTemplate();
            $patient_summary_dto->props = array_merge($patient_summary_template, $patient_summary_dto->props);
        }else{
            $add = array_merge($add,[
                'reference_type' => $patient_summary_dto->reference_type,
                'reference_id'   => $patient_summary_dto->reference_id
            ]);
            $create = [$add];
        }
        $patient_summary = $this->usingEntity()->updateOrCreate(...$create);

        $patient_model = $patient_summary_dto->patient_model ??= $this->PatientModel()->findOrFail($patient_summary_dto->patient_id);
        $patient_summary_dto->props['prop_patient'] = $patient_model->toShowApi()->resolve();

        $this->setEmrData($patient_summary_dto, $patient_summary);
        $this->fillingProps($patient_summary, $patient_summary_dto->props);
        $patient_summary->save();

        return $this->patient_summary_model = $patient_summary;
    }

    protected function setEmrData(mixed $patient_summary_dto, $patient_summary){
        $assessment_model = $patient_summary_dto->assessment_model;
        $patient_summary_dto->props['emr'] = $patient_summary->emr ?? [];
        $emr = $patient_summary_dto->props['emr'];
        if ($assessment_model->response_model == 'array'){
            $datas = $patient_summary_dto->{$assessment_model->morph} ?? [];
            array_unshift($datas, $assessment_model->toShowApi()->resolve());
            $datas = array_slice($datas, 0, 10);
            $emr[$assessment_model->morph] = $datas;
        }else{
            $emr[$assessment_model->morph] = $assessment_model->toShowApi()->resolve();
        }
        $patient_summary_dto->props['emr'] = $emr;
    }

    protected function getPatientSummaryTemplate(): array{
        return config('module-examination.patient_summary_template', []);
    }
}
