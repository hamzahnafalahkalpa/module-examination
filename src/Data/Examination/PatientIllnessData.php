<?php

namespace Hanafalah\ModuleExamination\Data\Examination;

use Hanafalah\ModuleExamination\Contracts\Data\Examination\PatientIllnessData as DataPatientIllnessData;
use Hanafalah\ModuleExamination\Data\ExaminationData;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Attributes\MapName;

class PatientIllnessData extends ExaminationData implements DataPatientIllnessData{
    #[MapName('id')]
    #[MapInputName('id')]
    public mixed $id = null;

    #[MapName('patient_id')]
    #[MapInputName('patient_id')]
    public mixed $patient_id = null;

    #[MapName('name')]
    #[MapInputName('name')]
    public string $name;

    #[MapName('disease_id')]
    #[MapInputName('disease_id')]
    public mixed $disease_id = null;

    #[MapName('disease_type')]
    #[MapInputName('disease_type')]
    public ?string $disease_type = null;

    #[MapName('disease_name')]
    #[MapInputName('disease_name')]
    public ?string $disease_name = null;

    #[MapName('reference_type')]
    #[MapInputName('reference_type')]
    public ?string $reference_type = null;

    #[MapName('reference_id')]
    #[MapInputName('reference_id')]
    public mixed $reference_id = null;

    #[MapName('reference_model')]
    #[MapInputName('reference_model')]
    public ?object $reference_model = null;

    #[MapName('examination_summary_id')]
    #[MapInputName('examination_summary_id')]
    public mixed $examination_summary_id = null;

    #[MapName('classification_disease_id')]
    #[MapInputName('classification_disease_id')]
    public mixed $classification_disease_id = null;

    public static function before(array &$attributes){
        $new = static::new();
        parent::before($attributes);
        $attributes['disease_type'] ??= 'Disease';
        $disease_model = $new->{$attributes['disease_type'].'Model'}();
        if (isset($attributes['disease_type']) && isset($attributes['disease_id'])) {
            $disease_model = $disease_model->with('parent')->findOrFail($attributes['disease_id']);
            $attributes['name'] ??= $disease_model->name;
            $attributes['disease_name'] ??= $disease_model->name;
            $attributes['classification_disease_id'] ??= $disease_model->parent->id ?? null;
        }

        $patient_model = $new->PatientModel();
        if (isset($attributes['patient_id'])) {
            $patient_model = $patient_model->findOrFail($attributes['patient_id']);
        }

        $classification_disease = $new->ClassificationDiseaseModel();
        if (isset($attributes['classification_disease_id'])) {
            $classification_disease = $classification_disease->findOrFail($attributes['classification_disease_id']);
        }

        $reference = $attributes['reference_model'] ?? $new->{$new->reference_type.'Model'}()->findOrFail($attributes['reference_id']);

        $attributes['prop_patient'] = $patient_model->toShowApi()->resolve();
        $attributes['prop_disease'] = $disease_model->toViewApi()->resolve();
        $attributes['prop_classification_disease'] = $classification_disease->toViewApi()->resolve();
        $attributes['prop_reference'] = $reference->toShowApi()->resolve();
    }
}