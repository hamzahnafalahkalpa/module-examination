<?php

namespace Hanafalah\ModuleExamination\Models\Examination\Assessment;

use Hanafalah\ModuleExamination\Models\Examination\Assessment\Assessment;

class LarynxExamination extends Assessment {
    protected $table = 'assessments';
    public $specific = [
        "epiglotis", "aritenoid", "plika_ventrikularis",
        "endoskopi","plika_vokalis", "rimaglotis"
    ];    

    public function getExams(mixed $default = null,? array $vars = null): array{
        return [
            "exam" => [
                "epiglotis" => null, 
                "aritenoid" => null, 
                "plika_ventrikularis" => null,
                "endoskopi" => null, 
                "plika_vokalis" => null, 
                "rimaglotis" => null
            ]
        ];
    }
}
