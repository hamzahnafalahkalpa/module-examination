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
    protected $list = ['id', 'parent_id', 'visit_registration_id', 'visit_examination_type','visit_examination_id', 'morph', 'props'];

    protected static function booted(): void{
        parent::booted();
        static::creating(function ($query) {
            if (!isset($query->morph)) $query->morph = $query->getMorphClass();
        });
    }

    public function getViewResource(){
        return ViewAssessment::class;
    }

    public function getShowResource(){
        return ShowAssessment::class;
    }

    protected function hideAttributes(): array{
        return [];
    }

    public function getExams(mixed $default = null,? array $vars = null): array{
        if ($this->response_model == 'array') return [];

        $result = [];
        $specifics = $vars ?? $this->specific;
        foreach ($specifics as $var) {
            if ($this->inArray($var,$this->hideAttributes())) continue;

            if (method_exists($this,'getSurveyKey')){
                $result[$var] = ($this->getSurveyKey() == $var) 
                        ? $this->getSurveys()
                        : $default;
            }else{
                $result[$var] = $default;
            }
        }
        return ['exam' => $result];
    }

    public function getExamResults($model): array{
        $result = [];
        $model   ??= $this;
        $new_model = $this->{$model->morph . 'Model'}();
        $specifics = $new_model->specific;
        foreach ($specifics as $var) $result[$var] = $model->{$var};
        return $result;
    }

    public function getMorph(){
        return $this->morph;
    }
}
