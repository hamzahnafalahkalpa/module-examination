<?php

namespace Hanafalah\ModuleExamination\Models\Examination\Assessment;

use Hanafalah\ModuleExamination\Models\Examination;
use Hanafalah\ModuleExamination\Resources\Examination\Assessment\{
    ViewAssessment, ShowAssessment
};
use Hanafalah\LaravelHasProps\Concerns\HasProps;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Assessment extends Examination
{
    use HasProps;
    public $response_model  = 'object';
    protected $list = [
        'id', 'parent_id', 'visit_registration_id', 'examination_summary_id',
        'patient_summary_id', 'examination_type','examination_id', 'morph', 'props'
    ];

    protected $casts = [
        'visit_registration_id'  => 'string',
        'examination_summary_id' => 'string',
        'examination_id'         => 'string',
        'examination_type'       => 'string',
        'morph'                  => 'string'
    ]; 

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
        $as_form = isset(request()->as_form) && request()->as_form;
        if ($this->response_model == 'array' && !$as_form) return [];

        $result = [];
        $specifics = $vars ?? $this->specific;
        $has_default = isset($default);
        foreach ($specifics as $var) {
            if ($this->inArray($var,$this->hideAttributes())) continue;
            $default ??=  Str::plural($var) == $var ? [] : null;
            if (method_exists($this,'getSurveyKey')){
                $result[$var] = ($this->getSurveyKey() == $var) 
                        ? $this->getSurveys()
                        : $default;
            }else{
                $result[$var] = $default;
            }
            if (!$has_default) $default = null;
        }
        return ['exam' => $result];
    }

    public function getExamResults(?Model $model = null): array{
        $result = [];
        $model   ??= $this;
        $new_model = $this->{$model->morph . 'Model'}();
        $specifics = $new_model->specific;
        foreach ($specifics as $var) {
            if (!isset($model->exam[$var])){
                $value = Str::plural($var) == $var ? [] : null;
            }else{
                $value = $model->exam[$var];
            }
            $result[$var] = $value;
        }
        return $result;
    }

    public function getMorph(){
        return $this->morph;
    }

    protected static function uncommitVisitExamination($query){
        if ($query->examination_type == 'VisitExamination'){
            $visit_examination = $query->examination;
            $visit_examination->is_commit = false;
            $visit_examination->save();
        }
    }

    public function examination(){return $this->morphTo();}
}
