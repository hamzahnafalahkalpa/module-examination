<?php

namespace Hanafalah\ModuleExamination\Models\Examination\Assessment;

class HearingLossHistory extends Assessment{

    protected $table  = 'assessments';
    public $response_model = 'array';
    public $specific  = [
        'trouble_history_id','option_hearing_loss_history','note'
    ];
}
