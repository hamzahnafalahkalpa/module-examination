<?php

namespace Gii\ModuleExamination\Models\Examination\Assessment;

class GCS extends Assessment {
    protected $table = 'assessments';
    public $specific = [
        'eyes_id', 'verbal_id', 'motor_id'
    ];

    public function getForeignKey(){
        return 'gcs_id';
    }

    public function getExamResults($model): array{
        $eyes   = $this->ExaminationStuffModel()->find($model->eyes_id);
        $verbal = $this->ExaminationStuffModel()->find($model->verbal_id);
        $motor  = $this->ExaminationStuffModel()->find($model->motor_id);
        $score  = intval($eyes->score) + intval($verbal->score) + intval($motor->score);
        $gcs_results = $this->gcsLogic($score);
        return [
            'eyes_id'              => $model->eyes_id,
            'verbal_id'            => $model->verbal_id,
            'motor_id'             => $model->motor_id,
            'score'                => $score,
            'gcs_result'           => $gcs_results['name'],
            'examination_stuff_id' => $gcs_results['examination_stuff_id'],
            'description'          => $gcs_results['description']
        ];
    }

    public function gcsLogic($score){
        $vital_stuff = $this->ExaminationStuffModel()->flagIn($this->VitalSignModel()->getMorphClass().'_LOC');
        switch (true) {
            case $score === 15                : $category = 'COMPOS MENTIS';break;
            case $score >= 13 && $score <= 14 : $category = 'APATIS';break;
            case $score === 12                : $category = 'DELIRIUM';break;
            case $score >= 10 && $score <= 11 : $category = 'SOMNOLENCE';break;
            case $score >= 8 && $score <= 9   : $category = 'SOPOR';break;
            case $score >= 6 && $score <= 7   : $category = 'SEMI COMA';break;
            case $score <= 5                  : $category = 'COMA';break;
            default:
                return [
                    'name' => 'UNKNOWN',
                ];
            break;
        }
        $vital_stuff = $vital_stuff->where('name', $category)->firstOrFail();
        return [
            'examination_stuff_id' => $vital_stuff->getKey(),
            'name'                 => $vital_stuff->name,
            'description'          => $vital_stuff->description
        ];
    }

    public function eyes(){return $this->belongsToModel('ExaminationStuff','eyes_id');}
    public function verbal(){return $this->belongsToModel('ExaminationStuff','verbal_id');}
    public function motor(){return $this->belongsToModel('ExaminationStuff','motor_id');}
}