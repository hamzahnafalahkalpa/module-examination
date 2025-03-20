<?php

namespace Hanafalah\ModuleExamination\Schemas\Examination\Assessment;

use Hanafalah\ModuleExamination\Contracts\Examination\Assessment\SOAP as AssessmentSOAP;

class SOAP extends Assessment implements AssessmentSOAP
{
    protected string $__entity = 'SOAP';
}
