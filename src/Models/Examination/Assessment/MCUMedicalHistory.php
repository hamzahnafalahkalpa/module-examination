<?php

namespace Gii\PuskesmasModuleExamination\Models\Examination\Assessment;

use Gii\PuskesmasModuleExamination\Models\Examination\Assessment\Assessment;

class MCUMedicalHistory extends Assessment {
    protected $table = 'assessments';

    public $specific = [
        'HIV/AIDS', 'Tuberculosis',
        'Malaria', 'Leprosy', 
        'Sexually Transmitted Diseases', 'Bronchial Asthma',
        'Heart Disease', 'Hypertension', 'Diabetes Mellitus (DM)',
        'Peptic Ulcer', 'Kidney Disease', 'Cancer', 'Epilepsy', 'Major Psychiatric Illness',
        'Hearing Problems', 'Hepatitis B', 'Hepatitis C', 'Any form of Cancer'
    ];

    public function getExams(mixed $default = null,? array $vars = null): array{
        return parent::getExams(['yes' => false, 'no' => true]);
    }
}
