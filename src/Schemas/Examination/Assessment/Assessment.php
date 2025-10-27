<?php

namespace Hanafalah\ModuleExamination\Schemas\Examination\Assessment;

use Hanafalah\ModuleExamination\Contracts\Data\AssessmentData;
use Hanafalah\ModuleExamination\Contracts\Schemas\Examination\Assessment\Assessment as ContractsAssessment;
use Illuminate\Support\Str;
use Hanafalah\ModuleExamination\Schemas\Examination;
use Illuminate\Database\Eloquent\{
    Builder,
    Model
};
use Illuminate\Support\Facades\Storage;

class Assessment extends Examination implements ContractsAssessment
{
    protected string $__entity = 'Assessment';
    public $assessment_model;

    protected function storePdf(&$attributes, $target_path){
        $attributes['files'] = $this->mustArray($attributes['files']);
        $attributes['paths'] ??= [];
        foreach ($attributes['files'] as $file) {
            if ($file instanceof \Illuminate\Http\UploadedFile) {
                $filename = $file->getClientOriginalName();
                $path     = $file->storeAs($target_path, $filename, ['disk' => 's3']);
                $attributes['paths'][] = Storage::disk('s3')->url($path);
            } else {
                if (isset($attributes['id'])) $attributes['paths'][] = $file;
            }
        }
        $paths = $this->assessment_model->paths ?? [];
        if (count($paths) > 0) {
            $diff  = array_diff($paths, $attributes['files']);
            if (isset($diff) && count($diff) > 0) {
                foreach ($diff as $path) Storage::disk('s3')->delete($path);
            }
        }

        return $attributes;
    }

    public function prepareStore(AssessmentData $assessment_dto): Model{
        $assessment = $this->prepareStoreAssessment($assessment_dto);
        return $this->assessment_model = $assessment;
    }

    public function storeAssessment(? AssessmentData $assessment_dto = null): array{
        return $this->transaction(function() use ($assessment_dto) {
           return $this->showEntityResource(function() use ($assessment_dto){
                return $this->prepareStore($assessment_dto ?? $this->requestDTO(config('app.contracts.AssessmentData'))); 
           });
        });
    }

    public function prepareStoreAssessment(AssessmentData $assessment_dto): Model{
        // if (isset($visit_registration->medic_service_id) && $visit_registration->status == RegistrationStatus::DRAFT->value) {
        //     $medic_service = $this->getMedicService($visit_registration->medic_service_id);
        //     if ($medic_service->flag == Label::OUTPATIENT->value) {
        //         // perlu di cek lagi
        //         $visit_registration->pushActivity(VisitRegistrationActivity::POLI_EXAM->value, [VisitRegistrationActivityStatus::POLI_EXAM_START->value]);
        //         $this->appVisitPatientSchema()->preparePushLifeCycleActivity($visit_patient, $visit_registration, 'POLI_EXAM', [
        //             'POLI_EXAM_START' => 'Pemeriksaan Dilakukan di Poli ' . $medic_service->name
        //         ]);
        //         $visit_registration->status = RegistrationStatus::PROCESSING->value;
        //         $visit_registration->save();
        //     }
        // }
        $model = $this->{$assessment_dto->morph.'Model'}();
        if (isset($attributes->id)) {
            $assessment = $model->find($attributes->id);
        } else {
            $assessment = $model->create([
                'visit_registration_id'   => $assessment_dto->visit_registration_id,
                'examination_id'   => $assessment_dto->examination_id,
                'examination_type'   => $assessment_dto->examination_type,
                // 'examination_summary_id' => $assessment_dto->examination_summary_id,
                // 'patient_summary_id'     => $assessment_dto->patient_summary_id,
                'parent_id'              => $assessment_dto->parent_id ?? null,
                'morph'                  => $assessment_dto->morph ?? $model->getMorphClass()
            ]);
        }
        $assessment->setAttribute('exam', $assessment_dto->props['exam']);
        $this->prepareAfterResolve($assessment);
        $assessment_dto->props['exam'] = $this->mergeArray($assessment->getExamResults(), $assessment_dto->props['exam']);
        $this->fillingProps($assessment,$assessment_dto->props);
        $assessment->save();
        return $this->assessment_model = $assessment;
    }

    protected function prepareAfterResolve(Model &$assessment_model): void{
        if (method_exists($assessment_model,'getAfterResolve')){
            $assessment_model = $assessment_model->getAfterResolve();
        }
    }

    public function prepareShowAssessment(?Model $model = null, ?array $attributes = null): mixed{
        $attributes ??= request()->all();
        $model ??= $this->getAssessment();

        if (!isset($model)) {
            $id                   = $attributes['id'] ?? null;
            $flag                 = $attributes['morph'];
            $visit_examination_id = $attributes['visit_examination_id'] ?? null;
            $patient_summary_id   = $attributes['patient_summary_id'] ?? null;

            $validation = $visit_examination_id ?? $patient_summary_id;

            if (!isset($validation) && !isset($id)) throw new \Exception('No visit_examination_id/id provided', 422);
            if (isset($validation) && !isset($id) && !isset($flag)) throw new \Exception('Flag is required if id is not provided', 422);
            $model = $this->assessment()->with($this->showUsingRelation());
            if (isset($id)) {
                $model = $model->find($id);
            } else {
                $flag = $attributes['morph'];
                $flag = Str::studly($flag);
                if (isset($patient_summary_id)) {
                    $model = $model->paginate(20);
                } else {
                    $response = $this->{$flag . 'Model'}()->response_model;
                    $model    = ($response == 'array') ? $model->get() : $model->first();
                }
            }
        } else {
            $model->load($this->showUsingRelation());
        }
        return $this->assessment_model = $model;
    }

    public function showAssessment(?Model $model = null): ?array{
        $assessment = $this->prepareShowAssessment($model);
        if (!isset($assessment)) return $assessment;
        return $this->showEntityResource(function () use ($assessment) {
            return $assessment;
        });
    }

    public function viewAssessmentList(): array
    {
        $keys = [];
        $assessments = $this->prepareViewAssessmentList();
        foreach ($assessments as $key => $assessment) {
            if ($this->{$assessment->morph . 'Model'}()->response_model == 'array') {
                $keys[$assessment->morph] ??= [];
                $keys[$assessment->morph][] = $assessment->toShowApi()->resolve();
            } else {
                $keys[$assessment->morph] = $assessment->toShowApi()->resolve();
            }
        }
        ksort($keys);
        return $keys;
    }

    public function usingEntity(): Model{
            if (isset(request()->morph)){
            $model = Str::studly(request()->morph);
        }else{
            $model = $this->getEntity();
        }
        return $this->{$model.'Model'}();
    }
}
