<?php

namespace Hanafalah\ModuleExamination\Data;

use Hanafalah\LaravelSupport\Concerns\Support\HasRequestData;
use Hanafalah\LaravelSupport\Supports\Data;
use Hanafalah\ModuleExamination\Contracts\Data\ExaminationData as DataExaminationData;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Attributes\MapName;
use stdClass;

class ExaminationData extends Data implements DataExaminationData
{
    use HasRequestData;

    #[MapInputName('response')]
    #[MapName('response')]
    public ?array $response = [];

    #[MapInputName('visit_examination_id')]
    #[MapName('visit_examination_id')]
    public mixed $visit_examination_id;

    #[MapInputName('visit_examination_model')]
    #[MapName('visit_examination_model')]
    public ?Model $visit_examination_model = null;

    #[MapInputName('visit_registration_model')]
    #[MapName('visit_registration_model')]
    public ?Model $visit_registration_model = null;

    #[MapInputName('visit_patient_model')]
    #[MapName('visit_patient_model')]
    public ?Model $visit_patient_model = null;  

    #[MapInputName('patient_model')]
    #[MapName('patient_model')]
    public ?object $patient_model = null;

    #[MapInputName('screening_ids')]
    #[MapName('screening_ids')]
    public ?array $screening_ids = null;

    #[MapInputName('assessment')]
    #[MapName('assessment')]
    public null|array|object $assessment = null;

    public static function after(self $data): self{
        $new = self::new();

        $data->screening_ids ??= [];

        $data->visit_examination_model ??=  $new->VisitExaminationModel()->with([
            'visitRegistration.visitPatient.patient'
        ])->findOrFail($data->visit_examination_id);    
        $data->visit_examination_id ??= $data->visit_examination_model->getKey();
        $visit_examination = $data->visit_examination_model;
        $data->visit_registration_model = $visit_registration = $visit_examination->visitRegistration;
        $data->visit_patient_model = $visit_patient = $visit_registration->visitPatient;
        $data->patient_model = $visit_patient->patient;
            
        $data->screening_ids = array_column($visit_examination->screenings ?? [], 'id');
        $data->response ??= [];
        // if (isset($data->assessment) && is_array($data->assessment)){
        //     $new->prepareExamination($data, 'assessment');
        // }
        return $data;
    }

    // private function prepareExamination(self &$examination_dto, $exam_key){
    //     $new = self::new();
    //     $examination_dto->response[$exam_key] = (object) [];
    //     $response = &$examination_dto->response[$exam_key];
    //     $current_exam = $examination_dto->{$exam_key};
    //     foreach ($current_exam as $key => &$exam) {
    //         if (!isset($exam['data'])) continue;
    //         if (array_is_list($exam['data'])){
    //             $response->{$key} = (object) ['data' => []];
    //             foreach ($exam['data'] as $data) {
    //                 $data['visit_examination_model'] = $examination_dto->visit_examination_model;
    //                 $data['morph'] = $key;
    //                 $exam['data'] = $new->requestDTO(AssessmentData::class,$data);
    //             }
    //         }else{
    //             $response->{$key} = (object) ['data' => new stdClass];
    //             $exam['data']['morph'] = $key;
    //             $exam['data']['visit_examination_model'] = $examination_dto->visit_examination_model;
    //             $exam['data'] = $new->requestDTO(AssessmentData::class,$exam['data']);
    //         }
    //     }
    // }
}
    