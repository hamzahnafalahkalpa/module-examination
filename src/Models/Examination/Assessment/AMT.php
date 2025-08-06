<?php

namespace Hanafalah\ModuleExamination\Models\Examination\Assessment;

use Hanafalah\ModuleExamination\Concerns\HasSurvey;
use Illuminate\Database\Eloquent\Model;

class AMT extends Assessment{
    use HasSurvey;

    protected $table  = 'assessments';
    public $specific  = [
        'summary','surveys'
    ];

    
    protected function getSurveyFlag(): ?string {
        return 'AMT';
    }
    
    public function getAfterResolve(): Model{
        $exam = $this->exam;
        $dynamic_forms = $exam['surveys'];
        $results = 0;
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
        switch ($calc) {
            case $calc > 7  || $calc >= 9  : $arr = ['NORMAL','score',$calc." | Menunjukan Normal"];break;
            case $calc >= 4 && $calc <= 7  : $arr = ['SEDANG','score',$calc." | Ingatan Gangguan Sedang"];break;
            case $calc <= 3                : $arr = ['BERAT','score',$calc." | Gangguan Ingatan Berat"];break;
        }
        return [
            'label' => $arr[0],
            'score' => $arr[1],
            'result'=> $arr[2]
        ];
    }
}
