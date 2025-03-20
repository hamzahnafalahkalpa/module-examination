<?php

namespace Hanafalah\ModuleExamination\Schemas\Examination\Assessment;

use Hanafalah\ModuleExamination\Contracts\Examination\Assessment\Assessment as ContractsAssessment;
use Hanafalah\ModuleExamination\Resources\Examination\Assessment\{
    ViewAssessment,
    ShowAssessment
};
use Illuminate\Support\Str;
use Hanafalah\ModuleExamination\Schemas\Examination;
use Hanafalah\ModuleMedicService\Enums\MedicServiceFlag;
use Illuminate\Database\Eloquent\{
    Builder,
    Collection,
    Model
};
use Hanafalah\ModulePatient\Enums\{
    VisitRegistration\Activity as VisitRegistrationActivity,
    VisitRegistration\ActivityStatus as VisitRegistrationActivityStatus
};
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Storage;
use Hanafalah\ModulePatient\Enums\VisitRegistration\RegistrationStatus;

class Assessment extends Examination implements ContractsAssessment
{
    protected string $__entity = 'Assessment';
    public static $assessment_model;

    protected array $__resources = [
        'view' => ViewAssessment::class,
        'show' => ShowAssessment::class
    ];

    protected function storePdf(&$attributes, $target_path)
    {
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
        $paths = static::$assessment_model->paths ?? [];
        if (count($paths) > 0) {
            $diff  = array_diff($paths, $attributes['files']);
            if (isset($diff) && count($diff) > 0) {
                foreach ($diff as $path) Storage::disk('s3')->delete($path);
            }
        }

        return $attributes;
    }

    public function prepareViewAssessmentList(?array $attributes = null): Collection
    {
        $attributes ??= request()->all();
        if (!isset($attributes['visit_examination_id'])) throw new \Exception('visit_examination_id is required', 422);
        return static::$assessment_model = $this->assessment()->when(isset(request()->visit_examination_id), function ($query) {
            $query->where('visit_examination_id', request()->visit_examination_id);
        })->get();
    }

    public function prepareStore(?array $attributes = null): Model
    {
        $attributes ??= request()->all();
        $this->prepareStoreAssessment($attributes);
        $this->setAssessmentProp($attributes);
        static::$assessment_model->save();
        return static::$assessment_model;
    }

    private function setPractitioner(&$assessment, $practitioner)
    {
        $prop_practitioner = $assessment->prop_practitioners;
        $assessment->setAttribute('prop_practitioners', $this->mergeArray($prop_practitioner ?? [], [[
            'id'         => $practitioner->getKey(),
            'name'       => $practitioner->name,
            'role_as'    => $practitioner->role_as,
            'updated_at' => now()
        ]]));
    }

    protected function setAssessmentProp(array $attributes): void
    {
        $specifics ??= $this->{$this->__entity . 'Model'}()->specific;
        $assessment   = &static::$assessment_model;
        foreach ($specifics as $key) $assessment->{$key} = $attributes[$key] ?? null;
        $assessment->save();
        //SAVE PRACTITIONER HISTORY
        if (isset(static::$__practitioner_evaluation)) {
            $practitioner = &static::$__practitioner_evaluation;
            $assessment->prop_practitioners ??= [];
            if (count($assessment->prop_practitioners) == 0) {
                $this->setPractitioner($assessment, $practitioner);
            } else {
                $ids = array_column($assessment->prop_practitioners, 'id');
                $src = array_search($practitioner->getKey(), $ids);
                if ($src === false) {
                    $this->setPractitioner($assessment, $practitioner);
                } else {
                    $prop_practitioners = $assessment->prop_practitioners;
                    $prop_practitioners[$src]['updated_at'] = now();
                    $assessment->setAttribute('prop_practitioners', $prop_practitioners);
                }
            }
            $assessment->save();
            $practitioner->is_commit = false;
            $practitioner->save();
        }
    }

    public function prepareStoreAssessment(?array $attributes = null): Model
    {
        $attributes ??= request()->all();

        if (!isset($attributes['visit_examination_id'])) throw new \Exception('visit_examination_id is required', 422);

        $visit_examination_schema = $this->schemaContract('visit_examination');
        $visit_examination        = $visit_examination_schema->visitExamination()->find($attributes['visit_examination_id']);
        $visit_registration       = $visit_examination->visitRegistration;
        $visit_patient            = $visit_registration->visitPatient;
        if (isset($visit_registration->medic_service_id) && $visit_registration->status == RegistrationStatus::DRAFT->value) {
            $medic_service = $this->getMedicService($visit_registration->medic_service_id);
            if ($medic_service->flag == MedicServiceFlag::OUTPATIENT->value) {
                // perlu di cek lagi
                $visit_registration->pushActivity(VisitRegistrationActivity::POLI_EXAM->value, [VisitRegistrationActivityStatus::POLI_EXAM_START->value]);
                $this->appVisitPatientSchema()->preparePushLifeCycleActivity($visit_patient, $visit_registration, 'POLI_EXAM', [
                    'POLI_EXAM_START' => 'Pemeriksaan Dilakukan di Poli ' . $medic_service->name
                ]);
                $visit_registration->status = RegistrationStatus::PROCESSING->value;
                $visit_registration->save();
            }
        }
        $model = $this->{$this->__entity . 'Model'}();
        if (isset($attributes['id'])) {
            $assessment = $model->find($attributes['id']);
        } else {
            $assessment = $model->create([
                'visit_examination_id'   => $attributes['visit_examination_id'],
                'examination_summary_id' => $attributes['examination_summary_id'],
                'patient_summary_id'     => $attributes['patient_summary_id'],
                'parent_id'              => $attributes['parent_id'] ?? null,
                'morph'                  => $attributes['morph'] ?? $model->getMorphClass()
            ]);
        }
        return static::$assessment_model = $assessment;
    }

    public function storeAssessment(): array
    {
        return $this->transaction(function () {
            return $this->showAssessment($this->prepareStoreAssessment());
        });
    }


    public function prepareRemoveAssessment(?array $attributes = null): bool
    {
        $attributes ??= request()->all();

        if (!isset($attributes['id'])) throw new \Exception('id is required', 422);
        static::$assessment_model = $this->assessment()->find($attributes['id']);
        if (!isset(static::$assessment_model)) return true;
        return static::$assessment_model->delete();
    }

    public function getAssessment(): mixed
    {
        return static::$assessment_model;
    }

    public function showUsingRelation(): array
    {
        return [];
    }

    public function prepareShowAssessment(?Model $model = null, ?array $attributes = null): mixed
    {
        $this->booting();
        $attributes ??= request()->all();
        $model ??= $this->getAssessment();

        if (!isset($model)) {
            $id                   = $attributes['id'] ?? null;
            $flag                 = $attributes['flag'];
            $visit_examination_id = $attributes['visit_examination_id'] ?? null;
            $patient_summary_id   = $attributes['patient_summary_id'] ?? null;

            $validation = $visit_examination_id ?? $patient_summary_id;

            if (!isset($validation) && !isset($id)) throw new \Exception('No visit_examination_id/id provided', 422);
            if (isset($validation) && !isset($id) && !isset($flag)) throw new \Exception('Flag is required if id is not provided', 422);

            $model = $this->assessment()->with($this->showUsingRelation());

            if (isset($id)) {
                $model = $model->find($id);
            } else {
                $flag = $attributes['flag'];
                $flag = Str::studly($flag);
                $model->when(isset($visit_examination_id), function ($query) use ($visit_examination_id) {
                    $query->where('visit_examination_id', $visit_examination_id);
                })->when(isset($patient_summary_id), function ($query) use ($patient_summary_id) {
                    $query->where('patient_summary_id', $patient_summary_id);
                })->when(isset($flag), function ($query) use ($flag) {
                    $query->where('morph', $flag);
                });

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
        return static::$assessment_model = $model;
    }

    public function showAssessment(?Model $model = null): ?array
    {
        $assessment = $this->prepareShowAssessment($model);
        if (!isset($assessment)) return $assessment;
        return $this->transforming($this->__resources['show'], function () use ($assessment) {
            return $assessment;
        });
    }

    public function prepareShowPatientEmrByFlag(?array $attributes = null): mixed
    {
        $attributes ??= request()->all();

        if (!isset($attributes['uuid'])) throw new \Exception('uuid is required', 422);
        $patient                          = $this->schemaContract('patient')->getPatientByUUID($attributes);
        $patient_summary                  = $patient->patientSummary;
        $attributes['patient_summary_id'] = $patient_summary->getKey();
        return $this->prepareShowAssessment(null, $attributes);
    }

    public function showPatientEmrByFlag(): array
    {
        return $this->transforming($this->__resources['show'], function () {
            return $this->prepareShowPatientEmrByFlag();
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

    public function prepareViewAssessmentPaginate(int $perPage = 50, array $columns = ['*'], string $pageName = 'page', ?int $page = null, ?int $total = null): LengthAwarePaginator
    {
        $paginate_options = compact('perPage', 'columns', 'pageName', 'page', 'total');
        return static::$assessment_model = $this->assessment()->paginate($perPage);
    }

    public function viewAssessmentPaginate(int $perPage = 50, array $columns = ['*'], string $pageName = 'page', ?int $page = null, ?int $total = null): array
    {
        $paginate_options = compact('perPage', 'columns', 'pageName', 'page', 'total');
        return $this->transforming($this->__resources['view'], function () use ($paginate_options) {
            return $this->prepareViewAssessmentPaginate(...$this->arrayValues($paginate_options));
        });
    }

    public function assessment(mixed $conditionals = null): Builder
    {
        $this->booting();
        return $this->AssessmentModel()->withParameters()->conditionals($conditionals)->orderBy('created_at', 'desc');
    }
}
