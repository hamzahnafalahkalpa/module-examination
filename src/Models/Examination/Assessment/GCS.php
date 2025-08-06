<?php

namespace Hanafalah\ModuleExamination\Models\Examination\Assessment;

use Illuminate\Database\Eloquent\Model;

class GCS extends Assessment {
    protected $table = 'assessments';
    public $specific = [
        'eyes_id', 'verbal_id', 'motor_id'
    ];

    public function getForeignKey(){
        return 'gcs_id';
    }

    public function getExamResults(?Model $model = null): array{
        $model ??= $this;
        $exam   = $model->exam;
        $eyes   = $this->GcsStuffModel()->findOrFail($exam['eyes_id']);
        $verbal = $this->GcsStuffModel()->findOrFail($exam['verbal_id']);
        $motor  = $this->GcsStuffModel()->findOrFail($exam['motor_id']);
        $score  = intval($eyes->score) + intval($verbal->score) + intval($motor->score);
        $gcs_results = $this->gcsLogic($score);
        return [
            'eyes_id'              => $exam['eyes_id'],
            'verbal_id'            => $exam['verbal_id'],
            'motor_id'             => $exam['motor_id'],
            'score'                => $score,
            'loc'                  => $gcs_results
        ];
    }

    public function gcsLogic($score){
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
        $vital_stuff = $this->VitalSignStuffModel()->where('label',$category)->firstOrFail();
        return $vital_stuff->toViewApiOnlies('id','name','flag','label');
    }

    public function eyes(){return $this->belongsToModel('ExaminationStuff','eyes_id');}
    public function verbal(){return $this->belongsToModel('ExaminationStuff','verbal_id');}
    public function motor(){return $this->belongsToModel('ExaminationStuff','motor_id');}
}