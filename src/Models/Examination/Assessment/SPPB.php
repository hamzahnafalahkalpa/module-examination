<?php

namespace Hanafalah\ModuleExamination\Models\Examination\Assessment;

use Hanafalah\ModuleExamination\Concerns\HasSurvey;
use Illuminate\Database\Eloquent\Model;

class SPPB extends Assessment{
    use HasSurvey;

    protected $table  = 'assessments';
    public $specific  = [
        'summary','surveys'
    ];

    protected function getSurveyFlag(): ?string {
        return 'SPPB';
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
            case $calc < 10    : $arr = ['TERBATAS',$calc,$calc." | Mobilitas Terbatas"];break;
            case ($calc >= 10) : $arr = ['NORMAL',$calc,$calc." | Mobilitas Normal"];break;
        }
        return [
            'label' => $arr[0] ?? null,
            'score' => $arr[1] ?? null,
            'result'=> $arr[2] ?? null
        ];
    }
}
