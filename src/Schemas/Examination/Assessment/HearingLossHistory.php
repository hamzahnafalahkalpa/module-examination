<?php

namespace Hanafalah\ModuleExamination\Schemas\Examination\Assessment;

use Hanafalah\ModuleExamination\Contracts\Data\AssessmentData;
use Hanafalah\ModuleExamination\Contracts\Schemas\Examination\Assessment\HearingLossHistory as AssessmentHearingLossHistory;
use Hanafalah\ModuleExamination\Schemas\Examination\Assessment\Assessment;
use Illuminate\Database\Eloquent\Model;

class HearingLossHistory extends Assessment implements AssessmentHearingLossHistory
{
    protected string $__entity   = 'HearingLossHistory';

    public function prepareStore(AssessmentData $assessment_dto): Model{
        $assessment_exam = &$assessment_dto->props['exam'];
        $trouble_history = $this->HearingLossStuffModel();
        if (isset($assessment_exam['trouble_history_id'])){
            $trouble_history = $trouble_history->findOrFail($assessment_exam['trouble_history_id']);
        }
        $assessment_exam['trouble_history'] = $trouble_history->toViewApiOnlies('id','name','flag','label');
        return parent::prepareStore($assessment_dto);
    }
}
