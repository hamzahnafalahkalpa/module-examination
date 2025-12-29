<?php

namespace Hanafalah\ModuleExamination\Schemas\Examination\Assessment\MedicalLegalDoc;

use Hanafalah\ModuleExamination\Contracts\Schemas\Examination\Assessment\MedicalLegalDoc\TrxMedicalLegalDoc as MedicalLegalDocTrxMedicalLegalDoc;
use Hanafalah\ModuleExamination\Schemas\Examination\Assessment\Assessment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class TrxMedicalLegalDoc extends Assessment implements MedicalLegalDocTrxMedicalLegalDoc
{
    public $trx_medical_legal_doc;

    public function prepareStore(mixed &$assessment_dto): Model{
        $assessment_exam = &$assessment_dto->props['exam'];
        
        $document_type = $this->DocumentTypeModel()->findOrFail($assessment_exam['document_type_id']);
        $assessment_exam['document_type'] = $document_type->toViewApiOnlies('id','name','label');

        if (isset($assessment_exam['files']) && count($assessment_exam['files']) > 0) {
            $assessment_exam = $this->storePdf($assessment_exam, Str::snake(class_basename($this)));
        }
        $support = parent::prepareStore($assessment_dto);
        // $this->fillingProps($support, $assessment_dto->props);
        // $support->save();

        $visit_patient_model = $assessment_dto->visit_patient_model ?? $assessment_dto->visit_examination_model->visitPatient;
        $visit_patient_model->is_has_medical_legal_doc = true;
        $visit_patient_model->save();

        $visit_registration = $assessment_dto->visit_registration_model ?? $assessment_dto->visit_examination_model->visitRegistration;
        $visit_registration->is_has_medical_legal_doc = true;
        $visit_registration->save();
        return $this->assessment_model = $this->trx_medical_legal_doc = $support;
    }
}
