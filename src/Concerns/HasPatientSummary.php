<?php

namespace Hanafalah\ModuleExamination\Concerns;

trait HasPatientSummary
{
    public static function bootHasPatientSummary()
    {
        static::creating(function ($query) {
            if (isset($query->specific) && isset($query->patient_summary_id)) {
                $patient_summary_libs = config('module-examination.patient_summary_libs');
                $patient_summary = $query->patientSummary()->find($query->patient_summary_id);
                if (isset($patient_summary)) {
                    foreach ($query->specific as $lib) {
                        if (\in_array($lib, $patient_summary_libs)) {
                            $patient_summary->{$lib} = $query->{$lib} ?? null;
                        }
                    }
                    $patient_summary->save();
                }
            }
        });
    }

    public function patientSummary()
    {
        return $this->belongsToModel('PatientSummary');
    }
}
