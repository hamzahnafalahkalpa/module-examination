<?php

namespace Gii\ModuleExamination\Enums\Screening;

enum Type: string{
    case ORAL_SCREENING    = 'ORAL_SCREENING';
    case VISION_SCREENING  = 'VISION_SCREENING';
    case HEARING_SCREENING = 'HEARING_SCREENING';
}