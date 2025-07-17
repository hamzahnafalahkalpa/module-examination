<?php

namespace Hanafalah\ModuleExamination\Models\Examination\Assessment;

use Hanafalah\ModuleExamination\Concerns\HasSurvey;
use Illuminate\Database\Eloquent\Model;

class ADL extends Assessment{
    use HasSurvey;

    protected $table  = 'assessments';
    public $specific  = [
        'result','surveys'
    ];

    protected function getSurveyFlag(): ?string {
        return 'ADL';
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
            case $result >= 20                    : return "Mandiri (A)";break;
            case ($result >= 12 && $result <= 19) : return "Ketergantungan Ringan (B)";break;
            case ($result >= 9 && $result <= 11)  : return "Ketergantungan Sedang (B)";break;
            case ($result >= 5 && $result <= 8)   : return "Ketergantungan Berat (C)";break;
            case ($result <= 4)                   : return "Ketergantungan Total (C)";break;
        }
        return '-';
    }
}