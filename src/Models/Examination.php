<?php

namespace Hanafalah\ModuleExamination\Models;

use Hanafalah\ModuleExamination\Concerns\HasForm;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\SoftDeletes;
use Hanafalah\LaravelHasProps\Concerns\HasProps;
use Hanafalah\LaravelSupport\Models\BaseModel;
use Hanafalah\ModuleExamination\Concerns\HasPatientSummary;
use Hanafalah\ModuleExamination\Resources\Examination\Assessment\{ViewAssessment,ShowAssessment};

class Examination extends BaseModel
{
    use HasProps, HasUlids, HasForm, SoftDeletes, HasPatientSummary;

    public $incrementing  = false;
    protected $keyType    = "string";
    protected $primaryKey = "id";

    protected $list = ['id', 'visit_examination_id', 'examination_summary_id', 'patient_summary_id', 'props'];

    protected static function booted(): void
    {
        parent::booted();
        static::created(function ($query) {
            static::uncommitVisitExamination($query);
        });
        static::updated(function ($query) {
            static::uncommitVisitExamination($query);
        });
    }

    protected static function uncommitVisitExamination($query){
        if (\method_exists($query, 'visitExamiantion')) {
            $visit_examination = $query->visitExamination;
            $visit_examination->is_commit = false;
            $visit_examination->save();
        }
    }

    public function getViewResource(){return ViewAssessment::class;}
    public function getShowResource(){return ShowAssessment::class;}

    public function examinationSummary(){return $this->belongsToModel('ExaminationSummary');}
    public function visitExamination(){return $this->belongsToModel('VisitExamination');}
    public function examinationTreatment(){return $this->hasOneModel('ExaminationTreatment', 'reference_id')->where('reference_type', $this->morph);}
}
