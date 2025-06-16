<?php

namespace Gii\PuskesmasModuleExamination\Models\Examination\Assessment;

use Gii\PuskesmasModuleExamination\Concerns\HasSurvey;
use Illuminate\Database\Eloquent\Model;

class NewBornCheckUp extends Assessment{
    use HasSurvey;

    protected $table  = 'assessments';
    public $specific  = [
        'result','surveys'
    ];

    protected function getSurveyFlag(): ?string {
        return 'NewBornCheckUp';
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
}
