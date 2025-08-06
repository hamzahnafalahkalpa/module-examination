<?php

namespace Hanafalah\ModuleExamination\Models\Examination\Assessment;

use Hanafalah\ModuleExamination\Models\Examination\Assessment\Assessment;

class FoodHandlerExamination extends Assessment {
    protected $table = 'assessments';

    public $specific = [
        "Stool Occult Blood","Ova & Parasites (O&P test)",
        "Stool Culture"
    ];

    public function getExams(mixed $default = null,? array $vars = null): array{
        return [
            "exam" => [
                "Stool Occult Blood" => "Negative",
                "Ova & Parasites (O&P test)" => [
                    "Roundworms: Ascaris lubricoldes"   => "Negative",
                    "Hookworms: Necalor americanus"     => "Negative",
                    "Pinworms: Enteroblus vermicularis" => "Negative",
                    "Tapeworms: Diphyllobothrium latum, Taenia saginata, and Taenia solium" => "Negative",
                    "Protozoa: Entamoeba histolytica and Giardia lamblia" => "Negative"
                ],
                "Stool Culture" => [
                    "Salmonella sp."   => "Negative",
                    "Shigella sp."     => "Negative",
                    "Escherichia coli" => "Negative",
                    "Vibrio cholerae"  => "Negative"
                ]
            ]
        ];
    }
}