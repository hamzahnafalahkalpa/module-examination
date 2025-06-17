<?php

namespace Hanafalah\ModuleExamination\Models\Examination\Assessment;

use Hanafalah\ModuleExamination\Concerns\HasSurvey;

class KalaIIIExamination extends Assessment{

    protected $table  = 'assessments';
    public $specific  = [
        'time',
        'gived_oksitosin','laserasi_perineum_derajat',
        'gived_oksitosin_other','note_gived_oksitosin_other',
        'umbilical_cord_care','note_umbilical_cord_care',
        'masase_fundus_uteri','note_masase_fundus_uteri',
        'conditions',
        'amount_of_blood','another_problem','problem_management','resume'
    ];
    public function setConditions(array $conditions){
        $this->conditions[] = [
            'condition_type'        => $conditions['condition_type'],
            'condition_result'      => $conditions['condition_result'],
            'condition_note'        => $conditions['condition_note']
        ];
    }
}
