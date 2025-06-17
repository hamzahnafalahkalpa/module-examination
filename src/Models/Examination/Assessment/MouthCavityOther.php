<?php

namespace Hanafalah\ModuleExamination\Models\Examination\Assessment;

use Hanafalah\ModuleExamination\Concerns\HasSurvey;
use Illuminate\Database\Eloquent\Model;

class MouthCavityOther extends Assessment{
    use HasSurvey;

    protected $table  = 'assessments';
    public $specific  = [
        'surveys'
    ];

    protected function getSurveyFlag(): ?string {
        return 'MouthCavityOther';
    }

    public function getAfterResolve(): Model{
        $dynamic_forms = $this->surveys;
        $new_surveys   = $this->getSurveyByFlag()->dynamic_forms;
        foreach ($dynamic_forms as $dynamic_form) {
            if (isset($dynamic_form[$dynamic_form['key']],$dynamic_form[$dynamic_form['key']]['value'])){
                $new_surveys[$dynamic_form['key']]['value'] = $dynamic_form[$dynamic_form['key']];
            }
        }
        $this->setAttribute('surveys',$new_surveys);
        $this->save();
        return $this;
    }
}
