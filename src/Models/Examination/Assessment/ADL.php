<?php

namespace Hanafalah\ModuleExamination\Models\Examination\Assessment;

use Hanafalah\ModuleExamination\Concerns\HasSurvey;
use Illuminate\Database\Eloquent\Model;

class ADL extends Assessment{
    use HasSurvey;

    protected $table  = 'assessments';
    public $specific  = [
        'result','summary','surveys'
    ];

    protected function getSurveyFlag(): ?string {
        return 'ADL';
    }

    public function getAfterResolve(): Model{
        $exam = &$this->exam;
        $dynamic_forms = $exam['surveys'];
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
            case $calc >= 20                    : $arr = ['MANDIRI',$calc."| Mandiri (A)"];break;
            case ($calc >= 12 && $calc <= 19) : $arr = ['RINGAN',$calc."| Ketergantungan Ringan (B)"];break;
            case ($calc >= 9 && $calc <= 11)  : $arr = ['SEDANG',$calc."| Ketergantungan Sedang (B)"];break;
            case ($calc >= 5 && $calc <= 8)   : $arr = ['BERAT',$calc."| Ketergantungan Berat (C)"];break;
            case ($calc <= 4)                   : $arr = ['TOTAL',$calc."| Ketergantungan Total (C)"];break;
        }
        return [
            'label' => $arr[0] ?? null,
            'score' => $arr[1] ?? null,
            'result'=> $arr[2] ?? null
        ];
    }
}