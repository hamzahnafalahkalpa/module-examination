<?php

namespace Hanafalah\ModuleExamination\Models\Examination\Assessment;

use Hanafalah\ModuleExamination\Models\Examination\Assessment\Assessment;

class MCUExamSummary extends Assessment {
    protected $table = 'assessments';

    public $specific = [
        'physical_examination',
        'opthalmology_examination',
        'tone_audiogram',
        'electrocardiogram',
        'cbc_hematology_panel',
        'urinalysis',
        'chemistry_panel',
        'hepatitis_panel',
        'vdrl_rpr_test',
        'stool_analysis',
        'chest_x_ray',
        'drug_test',
        'stool_culture',
        'mantoux_test',
        'pregnancy_test'
    ];

    public function getExams(mixed $default = null, ?array $vars = null): array {
        $results = $this->mergeExams([
            'physical_examination',
            'opthalmology_examination',
            'tone_audiogram',
            'electrocardiogram',
            'cbc_hematology_panel',
            'urinalysis',
            'chemistry_panel',
            'hepatitis_panel',
            'vdrl_rpr_test',
            'stool_analysis',
            'chest_x_ray',
        ], ['normal' => true, 'abnormal' => false]);

        $results = $this->mergeArray($results, $this->mergeExams([
            'drug_test',
            'stool_culture',
            'mantoux_test'
        ], ['positive' => false, 'negative' => true]));

        $results['pregnancy_test'] = ['positive' => false, 'negative' => false];

        return ['exam' => $results];
    }

    private function mergeExams(array $exams, mixed $default = null): array {
        $results = [];
        $exam = parent::getExams($default, $exams);
        $results = $this->mergeArray($results, $exam['exam']);
        return $results;
    }
}
