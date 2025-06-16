<?php

namespace Gii\PuskesmasModuleExamination\Models\Examination\Assessment;

class Allergy extends Assessment {
    protected $table       = 'assessments';
    public $response_model = 'array';
    public $specific = [
        'allergy_type_id', 'name', 'allergy_scale', 'allergen'
    ];

    public function getExamResults($model): array{
        return [
            'allergy_type_id'     => $model->allergy_type_id,
            'allergy_type_spell'  => $this->getAllergyTypeSpell($model),
            'name'                => $model->name,
            'allergy_scale'       => $model->allergy_scale,
            'allergy_scale_spell' => $this->getScaleSpell($model),
            'allergen'            => $model->allergen 
        ];
    }

    public function getAllergyTypeSpell($model): string{
        $stuff = $this->ExaminationStuffModel()->find($model->allergy_type_id);
        return $stuff->name;
    }
    
    public function getScaleSpell($model): ?string{
        switch ($model->allergy_scale){
            case 0 : return 'Tidak ada gejala';break;
            case 1 : return 'Ringan';break;
            case 2 : return 'Sedang';break;
            case 3 : return 'Berat';break;
            case 4 : return 'Sangat Berat';break;
        }
        return null;
    }
}