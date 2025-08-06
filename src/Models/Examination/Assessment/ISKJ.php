<?php

namespace Hanafalah\ModuleExamination\Models\Examination\Assessment;

use Hanafalah\ModuleExamination\Concerns\HasSurvey;
use Illuminate\Database\Eloquent\Model;

//INSTRUMENT SKRINING KESEHATAN JIWA (ISKJ)
class ISKJ extends Assessment{
    use HasSurvey;

    protected $table  = 'assessments';
    public $specific  = [
        'summary','surveys'
    ];

    protected function getSurveyFlag(): ?string {
        return 'ISKJ';
    }

    public function getAfterResolve(): Model{
        $exam = $this->exam;
        $dynamic_forms = $exam['surveys'];
        $results       = 0;
        foreach ($dynamic_forms as $dynamic_form) {
            if (isset($dynamic_form[$dynamic_form['key']],$dynamic_form[$dynamic_form['key']]['value'])){
                $results += $dynamic_form[$dynamic_form['key']]['value'];
            }
        }
        $exam['summary'] = $this->conclusion($results);
        $this->setAttribute('exam',$exam);
        return $this;
    }

    private function conclusion($calc){
        switch (true) {
            case $calc < 6                    : $arr = ['NORMAL',$calc,$calc." | Normal"];break;
            case ($calc >=6)                  : $arr = ['ABNORMAL',$calc,$calc." | Abnormal"];break;
        }
        return [
            'label' => $arr[0],
            'score' => $arr[1],
            'result'=> $arr[2]
        ];
    }
}
