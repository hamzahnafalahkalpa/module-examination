<?php

namespace Gii\ModuleExamination\Enums\Form;

enum Type: string{
    case VITAL_SIGN         = 'VITAL_SIGN';
    case INITIAL_DIAGNOSE   = 'INITIAL_DIAGNOSE';
    case SECONDARY_DIAGNOSE = 'SECONDARY_DIAGNOSE';
    case FINAL_DIAGNOSE     = 'FINAL_DIAGNOSE';
    case PAIN_SCALE         = 'PAIN_SCALE';
    case TREATMENT          = 'TREATMENT';
    case SYMPTOM            = 'SYMPTOM';
    case PATIENT_ILLNESS    = 'PATIENT_ILLNESS';
    case HEAD_TO_TOE        = 'HEAD_TO_TOE';
    case ALLOANAMNESE       = 'ALLOANAMNESE';
    case ODONTOGRAM         = 'ODONTOGRAM';
}