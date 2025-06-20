<?php

use Hanafalah\ModuleExamination\Models as ModuleExamination;
use Hanafalah\ModuleExamination\{
    Schemas\Examination\Assessment,
    Contracts
};

return [
    'app' => [
        'contracts' => [
        ],
    ],
    'libs' => [
        'model' => 'Models',
        'contract' => 'Contracts'
    ],
    'database' => [
        'models' => [
        ]
    ],
    'examinations' => [
        // 'Allergy'   => [
        //     'schema' => Assessment\Allergy::class,
        // ],
        // 'Alloanamnese'   => [
        //     'schema' => Assessment\Alloanamnese::class,
        // ],
        // 'Anthropometry'   => [
        //     'schema' => Assessment\Anthropometry::class,
        // ],
        // 'GCS' => [
        //     'schema' => Assessment\GCS::class,
        // ],
        // 'Symptom' => [
        //     'schema' => Assessment\Symptom::class,
        // ],
        // 'Triage' => [
        //     'schema' => Assessment\Triage::class,
        // ],
        // 'VitalSign' => [
        //     'schema' => Assessment\VitalSign::class,
        // ],
        // 'Vaccine' => [
        //     'schema' => Assessment\Vaccine::class,
        // ],
        // 'PainScale' => [
        //     'schema' => Assessment\PainScale::class,
        //     'libs'   => [
        //         'Wong-Baker Faces Pain Scale',
        //         'Numerical Rating Scale',
        //         'Faces Pain Scale',
        //         'Visual Analog Scale'
        //     ],
        //     'type' => 0
        // ],
        // 'InitialDiagnose' => [
        //     'schema' => Assessment\Diagnose\InitialDiagnose::class,
        // ],
        // 'PrimaryDiagnose' => [
        //     'schema' => Assessment\Diagnose\PrimaryDiagnose::class,
        // ],
        // 'SecondaryDiagnose' => [
        //     'schema' => Assessment\Diagnose\SecondaryDiagnose::class,
        // ],
        // 'FamilyIllness' => [
        //     'schema' => Assessment\Diagnose\FamilyIllness::class,
        // ],
        // 'HistoryIllness' => [
        //     'schema' => Assessment\Diagnose\HistoryIllness::class,
        // ],
        // 'ClinicalTreatment' => [
        //     'schema' => Assessment\Treatment\ClinicalTreatment::class,
        // ],
        // 'EyeExamination' => [
        //     'schema' => Assessment\EyeExamination::class,
        // ],
        // 'EyeRefractionExamination' => [
        //     'schema' => Assessment\EyeRefractionExamination::class,
        // ],
        // 'FoodHandlerExamination' => [
        //     'schema' => Assessment\FoodHandlerExamination::class,
        // ],
        // 'NoseExamination' => [
        //     'schema' => Assessment\NoseExamination::class,
        // ],
        // 'ThroatExamination' => [
        //     'schema' => Assessment\ThroatExamination::class,
        // ],
        // 'EarExamination' => [
        //     'schema' => Assessment\EarExamination::class,
        // ],
        // 'SOAP' => [
        //     'schema' => Assessment\SOAP::class,
        // ],
        // 'LarynxExamination' => [
        //     'schema' => Assessment\LarynxExamination::class,
        // ],
        // 'EyeVisionColor' => [
        //     'schema' => Assessment\EyeVisionColor::class,
        // ],
        // 'MCUMedicalHistory' => [
        //     'schema' => Assessment\MCUMedicalHistory::class,
        // ],
        // 'MCUPresentMedicalHistory' => [
        //     'schema' => Assessment\MCUPresentMedicalHistory::class,
        // ],
        // 'MCUExamSummary' => [
        //     'schema' => Assessment\MCUExamSummary::class,
        // ],
        // 'MCUPackageSummary' => [
        //     'schema' => Assessment\MCUPackageSummary::class,
        // ],
        // 'LabTreatment'  => [
        //     'schema' => Assessment\Treatment\LabTreatment::class,
        // ],
        // 'RadiologyTreatment' => [
        //     'schema' => Assessment\Treatment\RadiologyTreatment::class,
        // ],
        // 'TrxPrescription' => [
        //     'schema' => Assessment\Prescription\TrxPrescription::class,
        // ],
        // 'MedicinePrescription' => [
        //     'schema' => Assessment\Prescription\MedicinePrescription::class,
        // ],
        // 'MixMedicinePrescription' => [
        //     'schema' => Assessment\Prescription\MixMedicinePrescription::class,
        // ],
        // 'MedicToolPrescription' => [
        //     'schema' => Assessment\Prescription\MedicToolPrescription::class,
        // ],
        // 'MedicalSupport' => [
        //     'schema' => Assessment\MedicalSupport\MedicalSupport::class,
        // ],
        // 'LabSupport' => [
        //     'schema' => Assessment\MedicalSupport\LabSupport::class,
        // ],
        // 'RadiologySupport' => [
        //     'schema' => Assessment\MedicalSupport\RadiologySupport::class,
        // ],
    ],
    'patient_summary_libs' => [
        //ADD YOUR LIBS HERE AS STRING
        //ex: HIV_AIDS in HUMAN DISEASE, ENGINE TROUBLE in ENGINE DISEASE, etc
    ],
    'warehouse' => null //add like Warehouse::class
];
