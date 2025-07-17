<?php

namespace Hanafalah\ModuleExamination\Models\Examination\Assessment;

class FamilyPlanningService extends Assessment{

    protected $table  = 'assessments';
    public $specific  = [
        'is_inflamation','note_inflamation',
        'is_gynecological_tumor','note_gynecological_tumor',
        'position_uterus','contraception_histories'
    ];

    public function setContraceptionHistories(array $contraceptionHistory){
        $this->contraception_histories[] = [
            'contraception' => $contraceptionHistory['contraception'],
            'status'        => $contraceptionHistory['status'],
            'stop_date'     => $contraceptionHistory['stop_date']
        ];
    }
}
