<?php

namespace Hanafalah\ModuleExamination\Schemas\Examination\Assessment;

use Hanafalah\ModuleExamination\Contracts\Schemas\Examination\Assessment\AdministrationVitaminA as AssessmentAdministrationVitaminA;

class AdministrationVitaminA extends Assessment implements AssessmentAdministrationVitaminA
{
    protected string $__entity   = 'AdministrationVitaminA';
    public $administration_vitamin_a_model;
}
