<?php

namespace Hanafalah\ModuleExamination\Models\Examination\Assessment;

use Hanafalah\ModuleExamination\Models\Examination\Assessment\Assessment;

class MCUPresentMedicalHistory extends Assessment {
    protected $table = 'assessments';

    public $specific = [
        'Shortness of breath', 'Chest pains', 'Palpitaitons',
        'Swelling of feet', 'Frequent headaches', 'Cough for 2 weeks or with blood',
        'Loss of appetite', 'Excessive thirst and freq. urination',
        'Dysuria, hematuria or other urinary issues', 'Urethral/vaginal discharge',
        'Multiple joint pain', 'Visual problem/color blindness'
    ];

    public function getExams(mixed $default = null,? array $vars = null): array{
        return parent::getExams(['yes' => false, 'no' => true]);
    }
}
