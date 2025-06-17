<?php

namespace Hanafalah\ModuleExamination\Models\Examination\Assessment;

use Hanafalah\ModuleExamination\Models\Examination\Assessment\Assessment;

class MCUExamSummary extends Assessment {
    protected $table = 'assessments';

    public $specific = [
        'Physical Examination', 'Opthalmology Examination',
        'Tone Audiogram', 'Electrocardiogram', 'CBC (Hematology Panel)',
        'Urinalysis', 'Chemistry Panel', 'Hepatitis Panel',
        'VDLR (RPR) Test', 'Stool Analysis', 'Chest X-ray',
        'Drug Test', 'Stool Culture', 'Mantoux Test', 'Pregnancy Test'
    ];

    public function getExams(mixed $default = null,? array $vars = null): array{
        $results = $this->mergeExams([
            'Physical Examination', 'Opthalmology Examination',
            'Tone Audiogram', 'Electrocardiogram', 'CBC (Hematology Panel)',
            'Urinalysis', 'Chemistry Panel', 'Hepatitis Panel',
            'VDLR (RPR) Test', 'Stool Analysis', 'Chest X-ray'
        ], ['Normal' => true, 'Abnormal' => false]);

        $results = $this->mergeArray($results,$this->mergeExams([
            'Drug Test', 'Stool Culture', 'Mantoux Test'
        ], ['Positive' => false, 'Negative' => true]));

        $results['Pregnancy Test'] = ['Positive' => false, 'Negative' => false];
        return ['exam' => $results];
    }

    private function mergeExams(array $exams,mixed $default = null){
        $results = [];
        $exam = parent::getExams($default, $exams);
        $results = $this->mergeArray($results, $exam['exam']);
        return $results;
    }
}
