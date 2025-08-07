<?php

namespace Hanafalah\ModuleExamination\Models\Examination\Assessment;

use Hanafalah\ModuleExamination\Models\Examination\Assessment\Assessment;

class MCUMedicalHistory extends Assessment {
    protected $table = 'assessments';

    public $specific = [
        'hiv_aids',
        'tuberculosis',
        'malaria',
        'leprosy',
        'sexually_transmitted_diseases',
        'bronchial_asthma',
        'heart_disease',
        'hypertension',
        'diabetes_mellitus_dm',
        'peptic_ulcer',
        'kidney_disease',
        'cancer',
        'epilepsy',
        'major_psychiatric_illness',
        'hearing_problems',
        'hepatitis_b',
        'hepatitis_c',
        'any_form_of_cancer'
    ];

    public function getExams(mixed $default = null, ?array $vars = null): array {
        return parent::getExams(['yes' => false, 'no' => true]);
    }
}
