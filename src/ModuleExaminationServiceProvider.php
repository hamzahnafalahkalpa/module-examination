<?php

namespace Hanafalah\ModuleExamination;

use Hanafalah\ModuleDisease\Contracts\Disease;
use Hanafalah\LaravelSupport\Providers\BaseServiceProvider;
use Hanafalah\ModuleExamination\Contracts\Examination\Assessment as ContractAssessment;
use Hanafalah\ModuleExamination\Contracts\Examination\Assessment\{
    Treatment,
    Prescription,
    Diagnose
};
use Hanafalah\ModuleExamination\Schemas\Examination\Assessment as SchemasAssessment;

class ModuleExaminationServiceProvider extends BaseServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerMainClass(ModuleExamination::class)
            ->registerCommandService(Providers\CommandServiceProvider::class)
            ->registers([
                '*',
                'Services'  => function () {
                    $this->binds([
                        Contracts\ModuleExamination::class                          => ModuleExamination::class,
                        Contracts\Examination::class                                => Schemas\Examination::class,
                        Contracts\ExaminationStuff::class                           => Schemas\ExaminationStuff::class,
                        Contracts\Examination\ExaminationTreatment::class           => Schemas\Examination\ExaminationTreatment::class,
                        Contracts\Examination\PatientIllness::class                 => Schemas\Examination\PatientIllness::class,
                        Contracts\Examination\Prescription::class                   => Schemas\Examination\Prescription::class,
                        ContractAssessment\MCUExamSummary::class                    => SchemasAssessment\MCUExamSummary::class,
                        ContractAssessment\MCUPackageSummary::class                 => SchemasAssessment\MCUPackageSummary::class,
                        ContractAssessment\MCUMedicalHistory::class                 => SchemasAssessment\MCUMedicalHistory::class,
                        ContractAssessment\MCUPresentMedicalHistory::class          => SchemasAssessment\MCUPresentMedicalHistory::class,
                        ContractAssessment\Vaccine::class                           => SchemasAssessment\Vaccine::class,
                        ContractAssessment\Allergy::class                           => SchemasAssessment\Allergy::class,
                        ContractAssessment\Alloanamnese::class                      => SchemasAssessment\Alloanamnese::class,
                        ContractAssessment\Anthropometry::class                     => SchemasAssessment\Anthropometry::class,
                        ContractAssessment\Assessment::class                        => SchemasAssessment\Assessment::class,
                        ContractAssessment\GCS::class                               => SchemasAssessment\GCS::class,
                        ContractAssessment\PainScale::class                         => SchemasAssessment\PainScale::class,
                        ContractAssessment\Symptom::class                           => SchemasAssessment\Symptom::class,
                        ContractAssessment\VitalSign::class                         => SchemasAssessment\VitalSign::class,
                        ContractAssessment\Triage::class                            => SchemasAssessment\Triage::class,
                        ContractAssessment\FoodHandlerExamination::class            => SchemasAssessment\FoodHandlerExamination::class,
                        Treatment\ClinicalTreatment::class                          => SchemasAssessment\Treatment\ClinicalTreatment::class,
                        Treatment\RadiologyTreatment::class                         => SchemasAssessment\Treatment\RadiologyTreatment::class,
                        Treatment\LabTreatment::class                               => SchemasAssessment\Treatment\LabTreatment::class,
                        Treatment\TrxTreatment::class                               => SchemasAssessment\Treatment\TrxTreatment::class,
                        ContractAssessment\MedicalSupport\MedicalSupport::class     => SchemasAssessment\MedicalSupport\MedicalSupport::class,
                        ContractAssessment\MedicalSupport\RadiologySupport::class   => SchemasAssessment\MedicalSupport\RadiologySupport::class,
                        ContractAssessment\MedicalSupport\LabSupport::class         => SchemasAssessment\MedicalSupport\LabSupport::class,
                        ContractAssessment\MedicalSupport\TrxMedicalSupport::class  => SchemasAssessment\MedicalSupport\TrxMedicalSupport::class,
                        Prescription\MedicinePrescription::class                    => SchemasAssessment\Prescription\MedicinePrescription::class,
                        Prescription\MedicToolPrescription::class                   => SchemasAssessment\Prescription\MedicToolPrescription::class,
                        Prescription\MixMedicinePrescription::class                 => SchemasAssessment\Prescription\MixMedicinePrescription::class,
                        Prescription\TrxPrescription::class                         => SchemasAssessment\Prescription\TrxPrescription::class,
                        Diagnose\Diagnose::class                                    => SchemasAssessment\Diagnose\Diagnose::class,
                        Diagnose\FamilyIllness::class                               => SchemasAssessment\Diagnose\FamilyIllness::class,
                        Diagnose\InitialDiagnose::class                             => SchemasAssessment\Diagnose\InitialDiagnose::class,
                        Diagnose\PrimaryDiagnose::class                             => SchemasAssessment\Diagnose\PrimaryDiagnose::class,
                        Diagnose\SecondaryDiagnose::class                           => SchemasAssessment\Diagnose\SecondaryDiagnose::class,
                        Diagnose\HistoryIllness::class                              => SchemasAssessment\Diagnose\HistoryIllness::class,
                        Contracts\Form::class                                       => Schemas\Form\Form::class,
                        Contracts\Screening::class                                  => Schemas\Form\Screening::class,
                        Contracts\MasterVaccine::class                              => Schemas\MasterVaccine::class
                    ]);
                }
            ]);
        $this->setupExaminationLists();
    }

    private function setupExaminationLists(): self
    {
        $examination_lists = config('database.examinations', []);
        $lists = config('module-examination.examinations', []);
        $examination_lists = array_merge($examination_lists, $lists);
        config(['database.examinations' => $examination_lists]);
        return $this;
    }

    protected function dir(): string
    {
        return __DIR__ . '/';
    }

    protected function migrationPath(string $path = ''): string
    {
        return database_path($path);
    }
}
