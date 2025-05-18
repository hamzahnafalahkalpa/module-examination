<?php

namespace Hanafalah\ModuleExamination\Models\Examination\Assessment;

use Hanafalah\ModuleExamination\Models\Examination;
use Hanafalah\ModuleExamination\Resources\Examination\Assessment\{
    ViewAssessment,
    ShowAssessment
};
use Hanafalah\LaravelHasProps\Concerns\HasProps;
use Illuminate\Support\Str;

class Assessment extends Examination
{
    use HasProps;
    public $response_model  = 'object';
    protected $list = ['id', 'parent_id', 'visit_examination_id', 'examination_summary_id', 'patient_summary_id', 'morph', 'props'];

    protected static function booted(): void
    {
        parent::booted();
        static::creating(function ($query) {
            if (!isset($query->morph)) $query->morph = $query->getMorphClass();
        });
        static::created(function ($query) {
            $query->examinationSummary()->firstOrCreate([
                'reference_id'   => $query->visit_examination_id,
                'reference_type' => app(config('database.models.VisitExamination'))->getMorphClass(),
            ]);
        });
        static::updated(function ($query) {
            $examination_summary = $query->examinationSummary()->firstOrCreate([
                'reference_id'   => $query->visit_examination_id,
                'reference_type' => app(config('database.models.VisitExamination'))->getMorphClass(),
            ]);

            $exams = array_merge([], $examination_summary->exams ?? []);
            $exams[Str::snake($query->morph, '-')] = $query->toViewApi()->resolve()['exam'];
            $examination_summary->setAttribute('exams', $exams);
            $examination_summary->save();
        });
    }

    public function getViewResource()
    {
        return ViewAssessment::class;
    }

    public function getShowResource()
    {
        return ShowAssessment::class;
    }

    public function getExams(mixed $default = null, ?array $vars = null): array
    {
        if ($this->response_model == 'array') return [];

        $result = [];
        $specifics = $vars ?? $this->specific;
        foreach ($specifics as $var) $result[$var] = $default;
        return ['exam' => $result];
    }

    public function getExamResults($model): array
    {
        $result = [];
        $model   ??= $this;
        $new_model = $this->{$model->morph . 'Model'}();
        $specifics = $new_model->specific;
        foreach ($specifics as $var) $result[$var] = $model->{$var};
        return $result;
    }

    public function getMorph()
    {
        return $this->morph;
    }

    public function visitExamination(){return $this->morphTo();}

    public function examinationSummary()
    {
        return $this->hasOneModel('ExaminationSummary', 'reference_id')
            ->where('reference_type', $this->VisitExaminationModel()->getMorphClass());
    }
}
