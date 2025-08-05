<?php

namespace Hanafalah\ModuleExamination\Models\Examination\Assessment;

use Hanafalah\ModuleExamination\Concerns\HasSurvey;
use Illuminate\Database\Eloquent\Model;

class MNA extends Assessment{
    use HasSurvey;

    protected $table  = 'assessments';
    public $specific  = [
        'result','summary','surveys'
    ];

    protected function getSurveyFlag(): ?string {
        return 'MNA';
    }

    public function getAfterResolve(): Model{
        $exam = &$this->exam;
        $dynamic_forms = &$exam['surveys'];
        $results       = 0;
        foreach ($dynamic_forms as $dynamic_form) {
            if (isset($dynamic_form[$dynamic_form['key']],$dynamic_form[$dynamic_form['key']]['value'])){
                $results += $dynamic_form[$dynamic_form['key']]['value'];
            }
        }
        $exam['result'] = $results;
        $exam['summary'] = $this->conclusion($results);
        $this->setAttribute('exam',$exam);
        return $this;
    }

    private function conclusion($calc){
        switch (true) {
            case $calc >= 12 : $arr = ['NORMAL',$calc,$calc." | normal, tidak beresiko, tidak perlu melengkapi pengkajian"];break;
            case $calc < 12 : $arr = ['SUSPECT',$calc,$calc." | kemungkinan malnutrisi, lanjutkan pengkajian"];break;
        }
        return [
            'label' => $arr[0],
            'score' => $arr[1],
            'result'=> $arr[2]
        ];
    }
}
