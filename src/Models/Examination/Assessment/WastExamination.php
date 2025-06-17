<?php

namespace Hanafalah\ModuleExamination\Models\Examination\Assessment;

use Hanafalah\ModuleExamination\Concerns\HasSurvey;
use Illuminate\Database\Eloquent\Model;

class WastExamination extends Assessment{
    use HasSurvey;

    protected $table  = 'assessments';
    public $specific  = [
        'result','result_spell','surveys'
    ];

    protected function getSurveyFlag(): ?string {
        return 'WastExamination';
    }

    public function getAfterResolve(): Model{
        $dynamic_forms = $this->surveys;
        $new_surveys   = $this->getSurveyByFlag()->dynamic_forms;
        $results       = 0;
        foreach ($dynamic_forms as $dynamic_form) {
            if (isset($dynamic_form[$dynamic_form['key']],$dynamic_form[$dynamic_form['key']]['value'])){
                $results += $dynamic_form[$dynamic_form['key']]['value'];
                $new_surveys[$dynamic_form['key']]['value'] = $dynamic_form[$dynamic_form['key']];
            }
        }
        $this->result = $results;
        $this->result_spell = $this->getResultSpell();
        $this->setAttribute('surveys',$new_surveys);
        $this->save();
        return $this;
    }

    private function getResultSpell(): string{
        $result = $this->result;
        switch (true) {
            case $result > 1                    : return "Terindikasi Kekerasan";break;
            case ($result <= 1)                 : return "Aman dari prilaku kekerasan";break;
        }
        return '-';
    }
}
