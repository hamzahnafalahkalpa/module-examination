<?php

namespace Hanafalah\ModuleExamination\Schemas\Examination\Assessment\Diagnose;

use Hanafalah\ModuleExamination\Contracts\Schemas\Examination\Assessment\Diagnose\BasicDiagnose as ContractsBasicDiagnose;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class BasicDiagnose extends Diagnose implements ContractsBasicDiagnose
{
    protected string $__entity   = 'BasicDiagnose';

    public function prepareStore(mixed $assessment_dto): Model{
        $temp_exam = $assessment_dto->props['exam'];
        $assessment_exam = &$assessment_dto->props['exam'];
        if (isset($assessment_exam['type'])){
            $type = $assessment_exam['type'];
            unset($temp_exam['type']);
            $assessment_exam = [];
            if ($type == 'InitialDiagnose') {
                $assessment_exam['initial_diagnose'] = $temp_exam;
            }
            if ($type == 'PrimaryDiagnose') {
                $assessment_exam['primary_diagnose'] = $temp_exam;
            }
            if ($type == 'SecondaryDiagnose') {
                $assessment_exam['secondary_diagnose'] = $temp_exam;
            }
            $this->initDiagnose($assessment_dto->props['exam'][Str::snake($type)]);
            $this->prepareStoreAssessment($assessment_dto);
        }else{
            $this->prepareStoreAssessment($assessment_dto);
        }
        if (isset($assessment_exam['initial_diagnose'])) {
            $assessment_exam = $temp_exam;
            $this->schemaContract('initial_diagnose')->prepareStore($assessment_dto);
        }
        if (isset($assessment_exam['primary_diagnose'])) {
            $assessment_exam = $temp_exam;
            $this->schemaContract('primary_diagnose')->prepareStore($assessment_dto);
        }
        if (isset($assessment_exam['secondary_diagnose'])) {
            $assessment_exam = $temp_exam;
            $this->schemaContract('secondary_diagnose')->prepareStore($assessment_dto);
        }
        return $this->assessment_model;
    }
}
