<?php

namespace Hanafalah\ModuleExamination\Models\Examination\Assessment;

use Hanafalah\ModuleExamination\Concerns\HasSurvey;
use Illuminate\Database\Eloquent\Model;

class PUMA extends Assessment{
    use HasSurvey;

    protected $table  = 'assessments';
    public $specific  = [
        'result','summary','surveys'
    ];

    protected function getSurveyFlag(): ?string {
        return 'PUMA';
    }

    public function getAfterResolve(): Model{
        $exam = &$this->exam;
        $dynamic_forms = &$exam['surveys'];
        $results       = 0;
        foreach ($dynamic_forms as $dynamic_form) {
            if (isset($dynamic_form[$dynamic_form['key']],$dynamic_form[$dynamic_form['key']]['value'])){
                if(isset($dynamic_form[$dynamic_form['key']]['value'])){
                    $results += $dynamic_form[$dynamic_form['key']]['value'];
                }else{
                    $results += $dynamic_form[$dynamic_form['key']];
                }
            }
        }
        $exam['result']  = $results;
        $exam['summary'] = $this->conclusion($results);
        $this->setAttribute('exam',$exam);
        return $this;
    }

    private function conclusion($calc){
        switch (true) {
            case $calc < 6                    : $arr = ['RENDAH',$calc,$calc." | Risiko rendah PPOK"];break;
            case ($calc >=6)                  : $arr = ['TINGGI',$calc,$calc." | Risiko tinggi PPOK"];break;
        }
        return [
            'label' => $arr[0] ?? null,
            'score' => $arr[1] ?? null,
            'result'=> $arr[2] ?? null
        ];
    }
}
