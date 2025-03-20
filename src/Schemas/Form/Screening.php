<?php

namespace Hanafalah\ModuleExamination\Schemas\Form;

use Hanafalah\ModuleExamination\Contracts\Screening as ContractsScreening;
use Hanafalah\ModuleExamination\Resources\Screening\ViewScreening;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class Screening extends Form implements ContractsScreening
{
    protected string $__entity = 'Screening';
    public static $screening_model;

    protected array $__resources = [
        'view' => ViewScreening::class
    ];

    public function getScreening(): mixed
    {
        return static::$screening_model;
    }

    protected function showUsingRelation()
    {
        return ['forms', 'hasServices'];
    }

    public function prepareShowScreening(?Model $model = null, ?array $attributes = null): Model
    {
        $attributes ??= request()->all();
        $model = $this->getScreening();
        if (!isset($model)) {
            $id = $attributes['id'] ?? null;
            if (!isset($id)) throw new \Exception('No id provided', 422);
            $model = $this->screening()->with($this->showUsingRelation())->findOrFail($id);
        } else {
            $model->load($this->showUsingRelation());
        }
        return static::$screening_model = $model;
    }

    public function showScreening(?Model $model = null): array
    {
        return $this->transforming($this->__resources['view'], function () use ($model) {
            return $this->prepareShowScreening($model);
        });
    }

    public function prepareStoreScreening(?array $attributes = null): Model
    {
        $attributes ??= request()->all();

        $screening = $this->ScreeningModel()->updateOrCreate([
            'id'   => $attributes['id'] ?? null,
        ], [
            'name'  => request()->name
        ]);

        $screening->modelHasService()->delete();
        if (isset($attributes['medic_service'])) $attributes['medic_services'] = [$attributes['medic_service']];
        if (isset($attributes['medic_services']) && count($attributes['medic_services']) > 0) {
            foreach ($attributes['medic_services'] as $medic_service) {
                $screening->modelHasService()->firstOrCreate([
                    'service_id'   => $medic_service
                ]);
            }
            $services = $this->ServiceModel()->select('id', 'name')->whereIn('id', $attributes['medic_services'])->get()->toArray();
            $screening->setAttribute('medic_services', $services);
        }

        if (isset($attributes['forms']) && count($attributes['forms']) > 0) {
            $class = $this->ScreeningHasFormModel();

            $forms = $attributes['forms'];
            if (count($forms) > 0) {
                $keep = [];
                foreach ($forms as $form) {
                    $keep[] = $form['id'];
                    $screening_has_form = $class->firstOrCreate([
                        'form_id'      => $form['id'],
                        'screening_id' => $screening->getKey(),
                    ]);
                    $screening_has_form->ordering = $form['ordering'];
                    $screening_has_form->save();
                }
                if (count($keep) > 0) {
                    $class->where('screening_id', $screening->getKey())
                        ->whereNotIn('form_id', $keep)
                        ->delete();
                }
            } else {
                $screening->forms()->dispatch();
            }
        }

        $screening->save();
        return static::$screening_model = $screening;
    }

    public function storeScreening(): array
    {
        return $this->transaction(function () {
            return $this->showScreening($this->prepareStoreScreening());
        });
    }

    public function prepareviewScreeningList(?array $attributes = null): Collection
    {
        $attributes ??= request()->all();


        if (isset($attributes['visit_examination_id'])) {
            $visitExamination = $this->VisitExaminationModel()->with("visitRegistration")->where("id", $attributes['visit_examination_id'])->first();
        } else $visitExamination = null;
        return static::$form_model = $this->screening(function ($q) use ($visitExamination) {
            if (isset($visitExamination)) {
                $visitRegistration = $visitExamination->visitRegistration;
                $q->where("props->medic_service->id", $visitRegistration->medic_service_id);
            }
        })->get();
    }

    public function viewScreeningList(): array
    {
        return $this->transforming($this->__resources['view'], function () {
            return $this->prepareviewScreeningList();
        });
    }

    public function prepareDeleteScreening(?array $attributes = null): bool
    {
        $attributes ??= request()->all();
        if (!isset($attributes['id'])) throw new \Exception('No id provided', 422);

        return $this->screening()->destroy($attributes['id']);
    }

    public function deleteScreening(): bool
    {
        return $this->transaction(function () {
            return $this->prepareDeleteScreening();
        });
    }

    public function form()
    {
        $this->booting();
        return $this->FormModel()->withParameters()->orderBy('ordering', 'asc');
    }

    public function screening($conditionals)
    {
        $this->booting();
        return $this->ScreeningModel()->conditionals($conditionals)->with(['forms', 'hasServices'])
            ->withParameters()->orderBy('ordering', 'asc');
    }
}
