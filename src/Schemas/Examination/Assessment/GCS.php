<?php

namespace Hanafalah\ModuleExamination\Schemas\Examination\Assessment;

use Hanafalah\ModuleExamination\Contracts\Data\AssessmentData;
use Hanafalah\ModuleExamination\Contracts\Schemas\Examination\Assessment\GCS as AssessmentGCS;
use Illuminate\Database\Eloquent\Model;

class GCS extends Assessment implements AssessmentGCS
{
    protected string $__entity   = 'GCS';

    public function prepareStore(AssessmentData &$assessment_dto): Model{
        $assessment_exam = &$assessment_dto->props['exam'];
        $gcs = $this->GcsStuffModel();
        if (isset($assessment_exam['eyes_id'])) $gcs = $gcs->findOrFail($assessment_exam['eyes_id']);
        $assessment_exam['eyes'] = $gcs->toViewApiOnlies('id','name','flag','label');

        if (isset($assessment_exam['verbal_id'])) $gcs = $gcs->findOrFail($assessment_exam['verbal_id']);
        $assessment_exam['verbal'] = $gcs->toViewApiOnlies('id','name','flag','label');

        if (isset($assessment_exam['motorik_id'])) $gcs = $gcs->findOrFail($assessment_exam['motorik_id']);
        $assessment_exam['motorik'] = $gcs->toViewApiOnlies('id','name','flag','label');
        return parent::prepareStore($assessment_dto);
    }
}
