<?php

namespace Hanafalah\ModuleExamination\Data;

use Hanafalah\ModuleExamination\Contracts\Data\AssessmentData as DataAssessmentData;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Attributes\MapName;

class AssessmentData extends ExaminationData implements DataAssessmentData
{
    #[MapInputName('id')]
    #[MapName('id')]
    public mixed $id = null;

    #[MapInputName('parent_id')]
    #[MapName('parent_id')]
    public mixed $parent_id = null;

    #[MapInputName('visit_registration_id')]
    #[MapName('visit_registration_id')]
    public mixed $visit_registration_id = null;

    #[MapInputName('examination_type')]
    #[MapName('examination_type')]
    public ?string $examination_type = null;

    #[MapInputName('examination_id')]
    #[MapName('examination_id')]
    public mixed $examination_id = null;

    #[MapInputName('morph')]
    #[MapName('morph')]
    public ?string $morph = null;

    #[MapInputName('is_addendum')]
    #[MapName('is_addendum')]
    public ?bool $is_addendum = false;

    #[MapInputName('props')]
    #[MapName('props')]
    public ?array $props = null;

    public static function before(array &$attributes){
        $attributes['is_addendum'] ??= false;
        if (isset($attributes['visit_examination_model'])){
            $exam_model = $attributes['visit_examination_model'];
            $attributes['examination_id'] = $exam_model->getKey();
            $attributes['examination_type'] = $exam_model->getMorphClass();
            $attributes['visit_registration_id'] ??= $exam_model->visit_registration_id;
        }
    }

}