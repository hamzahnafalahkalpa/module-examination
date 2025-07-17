<?php

namespace Hanafalah\ModuleExamination\Models\Examination;

use Hanafalah\ModuleExamination\Models\Examination;
use Hanafalah\ModuleExamination\Resources\Examination\PatientIllness\{
    ViewPatientIllness,
    ShowPatientIllness
};

class PatientIllness extends Examination
{
    //reference must be getMorphClass
    //in : FamilyIllness, InitialDiagnose, PrimaryDiagnose, SecondaryDiagnose
    //     HistoryIllness
    //name will bi classification_name if classification_id exists, default is disease_name
    //examination_summary_id here from people examination summary
    protected $list = [
        'id',
        'reference_type',
        'reference_id',
        'name',
        'patient_id',
        'props'
    ];

    protected $show = [
        'examination_summary_id',
        'patient_summary_id',
        'disease_type',
        'disease_id',
        'disease_name',
        'classification_disease_id'
    ];

    protected $casts = [
        'name' => 'string'
    ];

    public function getViewResource()
    {
        return ViewPatientIllness::class;
    }

    public function getShowResource()
    {
        return ShowPatientIllness::class;
    }

    public function patient()
    {
        return $this->belongsToModel('Patient');
    }
    public function disease()
    {
        return $this->morphTo();
    }
    public function reference()
    {
        return $this->morphTo();
    }
    public function classificationDisease()
    {
        return $this->morphTo(__FUNCTION__, 'disease_type', 'classification_disease_id');
    }
}
