<?php

namespace Hanafalah\ModuleExamination\Models\Examination\Assessment;

use Illuminate\Database\Eloquent\Model;

class Allergy extends Assessment {
    protected $table       = 'assessments';
    public $response_model = 'array';
    public $specific = [
        'allergy_type_id', 'name', 'allergy_scale', 'allergen', 'effects'
    ];

    public function getExamResults(?Model $model = null): array{
        $model ??= $this;
        $exam = $model->exam;
        return [
            'allergy_type_id'     => $exam['allergy_type_id'],
            'allergy_type_spell'  => $this->getAllergyTypeSpell($exam),
            'name'                => $exam['name'],
            'effects'             => $exam['effects'] ?? [],
            'allergy_scale'       => $exam['allergy_scale'],
            'allergy_scale_spell' => $this->getScaleSpell($exam),
            'allergen'            => $exam['allergen'] 
        ];
    }

    public function getAllergyTypeSpell($exam): string{
        $stuff = $this->AllergyStuffModel()->findOrFail($exam['allergy_type_id']);
        return $stuff->name;
    }
    
    public function getScaleSpell($exam): ?string{
        switch ($exam['allergy_scale']){
            case 0 : return 'Tidak ada gejala';break;
            case 1 : return 'Ringan';break;
            case 2 : return 'Sedang';break;
            case 3 : return 'Berat';break;
            case 4 : return 'Sangat Berat';break;
        }
        return null;
    }
}