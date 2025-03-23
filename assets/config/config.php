<?php

use Hanafalah\ModuleExamination\Models as ModuleExamination;
use Hanafalah\ModuleExamination\{
    Schemas\Examination\Assessment,
    Contracts
};

return [
    'app' => [
        'contracts' => [
            'patient_illness'               => Contracts\Examination\PatientIllness::class,
            'prescription'                  => Contracts\Examination\Prescription::class,
            'examination_treatment'         => Contracts\Examination\ExaminationTreatment::class,
            'master_vaccine'                => Contracts\MasterVaccine::class,
            'screening'                     => Contracts\Screening::class,
            'examination'                   => Contracts\Examination::class,
            'examination_stuff'             => Contracts\ExaminationStuff::class,
            'form'                          => Contracts\Form::class,
            'module_examination'            => Contracts\ModuleExamination::class
        ],
    ],
    'libs' => [
        'model' => 'Models',
        'contract' => 'Contracts'
    ],
    'database' => [
        'models' => [
            'ServiceLabel'              => ModuleExamination\ServiceLabel::class,
            'Form'                      => ModuleExamination\Form\Form::class,
            'Screening'                 => ModuleExamination\Form\Screening::class,
            'ScreeningHasForm'          => ModuleExamination\Form\ScreeningHasForm::class,
            'Examination'               => ModuleExamination\Examination::class,
            'ExaminationTreatment'      => ModuleExamination\Examination\ExaminationTreatment::class,
            'PatientIllness'            => ModuleExamination\Examination\PatientIllness::class,
            'PatientSummary'            => ModuleExamination\PatientSummary::class,
            'ExaminationStuff'          => ModuleExamination\ExaminationStuff::class,
            'Assessment'                => ModuleExamination\Examination\Assessment\Assessment::class,
            'VitalSign'                 => ModuleExamination\Examination\Assessment\VitalSign::class,
            'GCS'                       => ModuleExamination\Examination\Assessment\GCS::class,
            'Vaccine'                   => ModuleExamination\Examination\Assessment\Vaccine::class,
            'Allergy'                   => ModuleExamination\Examination\Assessment\Allergy::class,
            'Anthropometry'             => ModuleExamination\Examination\Assessment\Anthropometry::class,
            'PainScale'                 => ModuleExamination\Examination\Assessment\PainScale::class,
            'Symptom'                   => ModuleExamination\Examination\Assessment\Symptom::class,
            'Diagnose'                  => ModuleExamination\Examination\Assessment\Diagnose\Diagnose::class,
            'InitialDiagnose'           => ModuleExamination\Examination\Assessment\Diagnose\InitialDiagnose::class,
            'PrimaryDiagnose'           => ModuleExamination\Examination\Assessment\Diagnose\PrimaryDiagnose::class,
            'FamilyIllness'             => ModuleExamination\Examination\Assessment\Diagnose\FamilyIllness::class,
            'HistoryIllness'            => ModuleExamination\Examination\Assessment\Diagnose\HistoryIllness::class,
            'FoodHandlerExamination'    => ModuleExamination\Examination\Assessment\FoodHandlerExamination::class,
            'Alloanamnese'              => ModuleExamination\Examination\Assessment\Alloanamnese::class,
            'Triage'                    => ModuleExamination\Examination\Assessment\Triage::class,
            'ClinicalTreatment'         => ModuleExamination\Examination\Assessment\Treatment\ClinicalTreatment::class,
            'RadiologyTreatment'        => ModuleExamination\Examination\Assessment\Treatment\RadiologyTreatment::class,
            'LabTreatment'              => ModuleExamination\Examination\Assessment\Treatment\LabTreatment::class,
            'TrxTreatment'              => ModuleExamination\Examination\Assessment\Treatment\TrxTreatment::class,
            'MedicalSupport'            => ModuleExamination\Examination\Assessment\MedicalSupport\MedicalSupport::class,
            'RadiologySupport'          => ModuleExamination\Examination\Assessment\MedicalSupport\RadiologySupport::class,
            'LabSupport'                => ModuleExamination\Examination\Assessment\MedicalSupport\LabSupport::class,
            'TrxMedicalSupport'         => ModuleExamination\Examination\Assessment\MedicalSupport\TrxMedicalSupport::class,
            'EyeExamination'            => ModuleExamination\Examination\Assessment\EyeExamination::class,
            'EyeRefractionExamination'  => ModuleExamination\Examination\Assessment\EyeRefractionExamination::class,
            'EyeVisionColor'            => ModuleExamination\Examination\Assessment\EyeVisionColor::class,
            'NoseExamination'           => ModuleExamination\Examination\Assessment\NoseExamination::class,
            'ThroatExamination'         => ModuleExamination\Examination\Assessment\ThroatExamination::class,
            'EarExamination'            => ModuleExamination\Examination\Assessment\EarExamination::class,
            'LarynxExamination'         => ModuleExamination\Examination\Assessment\LarynxExamination::class,
            'SOAP'                      => ModuleExamination\Examination\Assessment\SOAP::class,
            'FormHasAnatomy'            => ModuleExamination\Form\FormHasAnatomy::class,
            'Odontogram'                => ModuleExamination\Examination\Assessment\Odontogram::class,
            'MCUPackageSummary'         => ModuleExamination\Examination\Assessment\MCUPackageSummary::class,
            'MCUMedicalHistory'         => ModuleExamination\Examination\Assessment\MCUMedicalHistory::class,
            'MCUExamSummary'            => ModuleExamination\Examination\Assessment\MCUExamSummary::class,
            'MCUPresentMedicalHistory'  => ModuleExamination\Examination\Assessment\MCUPresentMedicalHistory::class,
            'MedicinePrescription'      => ModuleExamination\Examination\Assessment\Prescription\MedicinePrescription::class,
            'MixMedicinePrescription'   => ModuleExamination\Examination\Assessment\Prescription\MixMedicinePrescription::class,
            'MedicToolPrescription'     => ModuleExamination\Examination\Assessment\Prescription\MedicToolPrescription::class,
            'TrxPrescription'           => ModuleExamination\Examination\Assessment\Prescription\TrxPrescription::class,
            'Prescription'              => ModuleExamination\Examination\Prescription::class,
            'MasterVaccine'             => ModuleExamination\MasterVaccine::class,
        ]
    ],
    'examinations' => [
        'Allergy'   => [
            'schema' => Assessment\Allergy::class,
        ],
        'Alloanamnese'   => [
            'schema' => Assessment\Alloanamnese::class,
        ],
        'Anthropometry'   => [
            'schema' => Assessment\Anthropometry::class,
        ],
        'GCS' => [
            'schema' => Assessment\GCS::class,
        ],
        'Symptom' => [
            'schema' => Assessment\Symptom::class,
        ],
        'Triage' => [
            'schema' => Assessment\Triage::class,
        ],
        'VitalSign' => [
            'schema' => Assessment\VitalSign::class,
        ],
        'Vaccine' => [
            'schema' => Assessment\Vaccine::class,
        ],
        'PainScale' => [
            'schema' => Assessment\PainScale::class,
            'libs'   => [
                'Wong-Baker Faces Pain Scale',
                'Numerical Rating Scale',
                'Faces Pain Scale',
                'Visual Analog Scale'
            ],
            'type' => 0
        ],
        'InitialDiagnose' => [
            'schema' => Assessment\Diagnose\InitialDiagnose::class,
        ],
        'PrimaryDiagnose' => [
            'schema' => Assessment\Diagnose\PrimaryDiagnose::class,
        ],
        'SecondaryDiagnose' => [
            'schema' => Assessment\Diagnose\SecondaryDiagnose::class,
        ],
        'FamilyIllness' => [
            'schema' => Assessment\Diagnose\FamilyIllness::class,
        ],
        'HistoryIllness' => [
            'schema' => Assessment\Diagnose\HistoryIllness::class,
        ],
        'ClinicalTreatment' => [
            'schema' => Assessment\Treatment\ClinicalTreatment::class,
        ],
        'EyeExamination' => [
            'schema' => Assessment\EyeExamination::class,
        ],
        'EyeRefractionExamination' => [
            'schema' => Assessment\EyeRefractionExamination::class,
        ],
        'FoodHandlerExamination' => [
            'schema' => Assessment\FoodHandlerExamination::class,
        ],
        'NoseExamination' => [
            'schema' => Assessment\NoseExamination::class,
        ],
        'ThroatExamination' => [
            'schema' => Assessment\ThroatExamination::class,
        ],
        'EarExamination' => [
            'schema' => Assessment\EarExamination::class,
        ],
        'SOAP' => [
            'schema' => Assessment\SOAP::class,
        ],
        'LarynxExamination' => [
            'schema' => Assessment\LarynxExamination::class,
        ],
        'EyeVisionColor' => [
            'schema' => Assessment\EyeVisionColor::class,
        ],
        'MCUMedicalHistory' => [
            'schema' => Assessment\MCUMedicalHistory::class,
        ],
        'MCUPresentMedicalHistory' => [
            'schema' => Assessment\MCUPresentMedicalHistory::class,
        ],
        'MCUExamSummary' => [
            'schema' => Assessment\MCUExamSummary::class,
        ],
        'MCUPackageSummary' => [
            'schema' => Assessment\MCUPackageSummary::class,
        ],
        'LabTreatment'  => [
            'schema' => Assessment\Treatment\LabTreatment::class,
        ],
        'RadiologyTreatment' => [
            'schema' => Assessment\Treatment\RadiologyTreatment::class,
        ],
        'TrxPrescription' => [
            'schema' => Assessment\Prescription\TrxPrescription::class,
        ],
        'MedicinePrescription' => [
            'schema' => Assessment\Prescription\MedicinePrescription::class,
        ],
        'MixMedicinePrescription' => [
            'schema' => Assessment\Prescription\MixMedicinePrescription::class,
        ],
        'MedicToolPrescription' => [
            'schema' => Assessment\Prescription\MedicToolPrescription::class,
        ],
        'MedicalSupport' => [
            'schema' => Assessment\MedicalSupport\MedicalSupport::class,
        ],
        'LabSupport' => [
            'schema' => Assessment\MedicalSupport\LabSupport::class,
        ],
        'RadiologySupport' => [
            'schema' => Assessment\MedicalSupport\RadiologySupport::class,
        ],
    ],
    'patient_summary_libs' => [
        //ADD YOUR LIBS HERE AS STRING
        //ex: HIV_AIDS in HUMAN DISEASE, ENGINE TROUBLE in ENGINE DISEASE, etc
    ],
    'warehouse' => null //add like Warehouse::class
];
