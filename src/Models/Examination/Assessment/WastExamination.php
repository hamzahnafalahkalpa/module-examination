<?php

namespace Hanafalah\ModuleExamination\Models\Examination\Assessment;

use Hanafalah\ModuleExamination\Concerns\HasSurvey;
use Illuminate\Database\Eloquent\Model;

//Woman Abuse Screening Tool (WAST)
class WastExamination extends Assessment{
    use HasSurvey;

    protected $table  = 'assessments';
    public $specific  = [
        'result','summary','surveys'
    ];

    protected function getSurveyFlag(): ?string {
        return 'WastExamination';
    }

    public function getAfterResolve(): Model{
        $exam = &$this->exam;
        $dynamic_forms = &$exam['surveys'];
        $new_surveys   = &$exam['dynamic_forms'];
        $results       = 0;
        foreach ($dynamic_forms as $dynamic_form) {
            if (isset($dynamic_form[$dynamic_form['key']],$dynamic_form[$dynamic_form['key']]['value'])){
                $results += $dynamic_form[$dynamic_form['key']]['value'];
                $new_surveys[$dynamic_form['key']]['value'] = $dynamic_form[$dynamic_form['key']];
            }
        }
        $exam['result'] = $results;
        $exam['summary'] = $this->conclusion($results);
        $this->setAttribute('exam',$exam);
        return $this;
    }

    private function conclusion($calc){
        switch (true) {
            case $calc < 10    : $arr = ['TERINDIKASI',$calc,$calc." | Terindikasi Kekerasan"];break;
            case ($calc >= 10) : $arr = ['TIDAK TERINDIKASI',$calc,$calc." | Aman dari prilaku kekerasan"];break;
        }
        return [
            'label' => $arr[0] ?? null,
            'score' => $arr[1] ?? null,
            'result'=> $arr[2] ?? null
        ];
    }
}
