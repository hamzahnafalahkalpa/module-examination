# CLAUDE.md - Module Examination

This file provides guidance to Claude Code when working with the `hanafalah/module-examination` package.

## Module Overview

Module Examination is a Laravel package that provides comprehensive medical examination functionality for clinics and healthcare facilities (klinik/puskesmas). It handles patient assessments, diagnoses, prescriptions, vital signs, treatments, and various medical examination forms used in clinical workflows.

**Namespace:** `Hanafalah\ModuleExamination`

**Description:** Module for examination in klinik or puskesmas (Indonesian healthcare facilities)

## CRITICAL: Memory and ServiceProvider Warnings

### ServiceProvider Uses `registers(['*'])`

The `ModuleExaminationServiceProvider` calls `registers(['*'])` which auto-loads ALL schemas:

```php
public function register(){
    $this->registerMainClass(ModuleExamination::class)
        ->registerCommandService(Providers\CommandServiceProvider::class)
        ->registers(['*']);  // AUTO-LOADS ALL SCHEMAS
    $this->setupExaminationLists();
}
```

**Implications:**
- All 80+ schema classes are loaded during registration
- All 110+ contracts are bound
- Memory usage increases significantly during boot
- If `hanafalah/laravel-support` is not properly configured, this can cause memory exhaustion

**If you encounter memory issues:**
1. Check that `hanafalah/laravel-support` version is 2.0+ with safe register methods
2. Verify the `SAFE_REGISTER_METHODS` constant excludes dangerous methods
3. Consider explicit registration instead of `['*']`

### Schema Classes Extend PackageManagement

All schema classes in `src/Schemas/` extend either:
- `Hanafalah\LaravelSupport\Supports\PackageManagement`
- `Hanafalah\ModulePatient\ModulePatient` (which extends PackageManagement)

These use the `HasModelConfiguration` trait which can trigger config loading chains. Be cautious when modifying schema classes.

## Dependencies

This module requires these packages (see `composer.json`):

```json
{
    "hanafalah/laravel-support": "dev-main",
    "hanafalah/module-transaction": "dev-main",
    "hanafalah/module-patient": "dev-main",
    "hanafalah/module-service": "dev-main",
    "hanafalah/module-summary": "dev-main",
    "hanafalah/module-disease": "dev-main"
}
```

**Key dependency note:** The main `Examination` schema extends `ModulePatient`, not `PackageManagement` directly, inheriting all patient-related functionality.

## Directory Structure

```
module-examination/
├── assets/
│   ├── config/
│   │   └── config.php           # Module configuration
│   └── database/
│       └── migrations/          # 12 migration files
├── src/
│   ├── Commands/
│   │   └── InstallMakeCommand.php
│   ├── Concerns/                # 4 traits
│   │   ├── HasForm.php          # Form relationship trait
│   │   ├── HasPatientSummary.php # Patient summary auto-update
│   │   ├── HasSurvey.php        # Dynamic survey support
│   │   └── HasSurveyItem.php    # Survey item handling
│   ├── Contracts/               # 110 interfaces
│   │   ├── Data/                # DTO contracts
│   │   │   ├── Examination/
│   │   │   └── Form/
│   │   └── Schemas/             # Schema contracts
│   │       ├── Examination/
│   │       │   └── Assessment/
│   │       └── Form/
│   ├── Data/                    # 30 Spatie Laravel Data DTOs
│   │   ├── Examination/
│   │   ├── Form/
│   │   ├── ExaminationData.php  # Main examination DTO
│   │   └── AssessmentData.php   # Assessment DTO (extends ExaminationData)
│   ├── Enums/
│   │   ├── Form/
│   │   │   ├── Flag.php         # FORM, SCREENING, SURVEY
│   │   │   ├── Type.php
│   │   │   └── Status.php
│   │   ├── FamilyRelationship/
│   │   │   └── Role.php
│   │   └── Screening/
│   │       └── Type.php
│   ├── Models/                  # 124 Eloquent models
│   │   ├── Examination/
│   │   │   └── Assessment/      # Assessment models
│   │   │       ├── Diagnose/
│   │   │       ├── Prescription/
│   │   │       ├── MedicalSupport/
│   │   │       ├── MedicalLegalDocument/
│   │   │       └── Treatment/
│   │   └── Form/
│   ├── Providers/
│   │   └── CommandServiceProvider.php
│   ├── Resources/               # 57 API resources (View/Show)
│   ├── Schemas/                 # 80 business logic schemas
│   │   ├── Examination.php      # MAIN examination schema
│   │   ├── Examination/
│   │   │   ├── Assessment/      # Assessment schemas
│   │   │   │   ├── Assessment.php  # Base assessment
│   │   │   │   ├── Diagnose/
│   │   │   │   ├── Prescription/
│   │   │   │   ├── MedicalSupport/
│   │   │   │   ├── MedicalLegalDoc/
│   │   │   │   └── Treatment/
│   │   │   ├── Prescription.php
│   │   │   ├── PatientIllness.php
│   │   │   └── ExaminationTreatment.php
│   │   ├── Form/
│   │   ├── PatientSummary.php
│   │   └── *Stuff.php           # Reference data schemas
│   ├── Seeders/
│   │   ├── ExaminationStuffSeeder.php
│   │   ├── FormSeeder.php
│   │   └── data/forms/          # 20+ form seed data files
│   ├── Supports/
│   ├── helper.php               # Global helper functions
│   ├── ModuleExamination.php    # Main module class
│   └── ModuleExaminationServiceProvider.php
└── composer.json
```

## Key Classes

### ModuleExaminationServiceProvider

Extends `BaseServiceProvider` from laravel-support. Key behaviors:
- Registers main class and command provider
- Calls `registers(['*'])` to auto-load all schemas
- Merges examination lists into global config via `setupExaminationLists()`

### ModuleExamination (Main Class)

```php
class ModuleExamination extends PackageManagement implements ContractsModuleExamination{}
```

Empty class that serves as the main module entry point. Registered as singleton.

### Examination Schema (Core)

Located at `src/Schemas/Examination.php`:
- **Extends:** `Hanafalah\ModulePatient\ModulePatient`
- **Main method:** `storeExamination()` - Transaction-wrapped examination storage
- **Handles:** Assessments, prescriptions, treatments, medical support, legal documents

Key methods:
```php
public function storeExamination(?ExaminationData $dto): array
public function prepareStoreExamination(ExaminationData $dto): array
public function commitExamination(ExaminationData $dto): array
public function addPractitioner(?array $attributes): Model
```

### Assessment Schema

Located at `src/Schemas/Examination/Assessment/Assessment.php`:
- Base class for all assessment types
- Handles PDF storage, assessment CRUD, morphable types

Key methods:
```php
public function prepareStore(AssessmentData &$dto): Model
public function storeAssessment(?AssessmentData $dto): array
public function prepareStoreAssessment(AssessmentData &$dto): Model
public function prepareShowAssessment(?Model $model): mixed
public function showAssessment(?Model $model): ?array
public function prepareRemoveAssessment(AssessmentData $dto)
```

### Assessment Model

Located at `src/Models/Examination/Assessment/Assessment.php`:
- Uses `HasProps` trait for dynamic properties
- Has `$response_model` property (object or array)
- Methods: `getExams()`, `getExamResults()`, `getMorph()`

## Assessment Types

### Clinical Assessments
| Class | Description | Response |
|-------|-------------|----------|
| VitalSign | BP, HR, RR, temp, SpO2 | object |
| Anthropometry | Height, weight, BMI | object |
| GCS | Glasgow Coma Scale | object |
| PainScale | Pain assessment (Wong-Baker, NRS, etc.) | object |
| Triage | Emergency triage | object |
| Symptom | Chief complaints | array |

### SOAP Notes
| Class | Description |
|-------|-------------|
| SubjectNote | Subjective findings |
| ObjectNote | Objective findings |
| AssessmentNote | Clinical assessment |
| PlanNote | Treatment plan |

### Diagnoses
| Class | Description |
|-------|-------------|
| InitialDiagnose | Initial diagnosis |
| PrimaryDiagnose | Primary ICD diagnosis |
| SecondaryDiagnose | Secondary diagnoses |
| HistoryIllness | Past medical history |
| FamilyIllness | Family history |
| PatientFamilyIllness | Patient family records |

### Prescriptions
| Class | Description |
|-------|-------------|
| MedicinePrescription | Medication prescriptions |
| MedicToolPrescription | Medical device prescriptions |
| MixPrescription | Compound prescriptions |

### Specialty Examinations
- EyeExamination, EarExamination, NoseExamination, ThroatExamination
- LarynxExamination, EyeRefractionExamination, EyeVisionColor
- AudiometriTest, HearingFunction

### Medical Support
- LabSupport - Laboratory orders
- RadiologySupport - Radiology orders
- MedicalSupport - General support orders

### Treatments
- ClinicalTreatment, LabTreatment, RadiologyTreatment

### MCU (Medical Check-Up)
- MCUMedicalHistory, MCUPresentMedicalHistory
- MCUExamSummary, MCUPackageSummary
- FoodHandlerExamination

### Other
- Vaccine, ImmunizationHistory, Allergy, SingleTest
- Alloanamnese, AMT, InformedConsent, MedicalCertificate
- FamilyPlanningService, AdministrationVitaminA
- HearingLossHistory, ChildAndPregnancyHistory

## Form System

### Form Types (Flag Enum)

```php
enum Flag: string
{
    case FORM      = 'FORM';
    case SCREENING = 'SCREENING';
    case SURVEY    = 'SURVEY';
}
```

### Dynamic Form Components

Configured in `config/module-examination.php`:
- InputText, InputNumber, InputOtp
- TextEditor, Textarea
- Checkbox, RadioButton
- Select, SelectButton, MultiSelect
- Slider, ToggleButton, ToggleSwitch
- DatePicker, DateTimePicker, TimePicker
- MonthPicker, YearPicker, DateRangePicker

## Reference Data (Stuff Models)

| Model | Purpose |
|-------|---------|
| VitalSignStuff | Vital sign parameters (including LOC) |
| AllergyStuff | Allergy categories |
| TriageStuff | Triage categories |
| GcsStuff | GCS parameters |
| SingleTestStuff | Rapid test types |
| ImmunizationStuff | Immunization types |
| ContraceptionStuff | Contraception methods |
| HearingLossStuff | Hearing loss categories |
| LaborTypeStuff | Labor/delivery types |
| BirthHelperStuff | Birth attendant types |
| ExaminationStuff | General parameters |
| MasterVaccine | Vaccine master data |

## Configuration

Located at `assets/config/config.php`:

```php
return [
    'namespace' => 'Hanafalah\\ModuleExamination',
    'libs' => [
        'model' => 'Models',
        'contract' => 'Contracts',
        'schema' => 'Schemas',
        'database' => 'Database',
        'data' => 'Data',
        'resource' => 'Resources',
        'migration' => '../assets/database/migrations'
    ],
    'examinations' => [
        'PainScale' => [
            'schema' => Assessment\PainScale::class,
            'libs' => ['Wong-Baker Faces Pain Scale', 'Numerical Rating Scale', ...],
            'type' => 0
        ]
    ],
    'patient_summary_template' => [
        'last_visit' => null,
        'vital_sign' => null,
        'anthropometry' => null,
        'symptoms' => null,
        'patient_illnesses' => null,
        'allergies' => null,
        'medications' => null,
        'family_illnesses' => null,
        'physical_exam' => null,
        'treatments' => null,
    ],
    'survey' => [
        'dynamic_form' => [
            'component' => [...] // UI component definitions
        ]
    ]
];
```

## Helper Functions

Defined in `src/helper.php`:

```php
// Generate URL for medical support files (S3 or local)
medical_support_url(string $url): string

// Generate URL for legal documents (S3 or local)
medical_legal_doc_url(string $url): string
```

## Database Migrations

Key tables created:
- `assessments` - Base assessment records (polymorphic)
- `prescriptions` - Prescription records
- `patient_illnesses` - Patient illness history
- `examination_stuffs` - Reference data
- `examination_treatments` - Treatment records
- `examination_summaries` - Adds columns to summaries
- `form_has_surveys` - Form-survey relationships
- `form_has_anatomies` - Form-anatomy relationships
- `screening_has_model` - Screening relationships
- `master_vaccines` - Vaccine master data

## Installation

```bash
# Publish migrations
php artisan module-examination:install
```

## Usage Patterns

### Storing an Examination

```php
use Hanafalah\ModuleExamination\Schemas\Examination;
use Hanafalah\ModuleExamination\Data\ExaminationData;

$examination = app(Examination::class);
$dto = ExaminationData::from([
    'visit_examination_id' => $visitExaminationId,
    'practitioner_evaluations' => [...],
    'assessment' => [
        'vital_sign' => ['data' => [...]],
        'primary_diagnose' => ['data' => [...]]
    ],
    'prescription' => [...],
    'treatments' => [...]
]);
$result = $examination->storeExamination($dto);
```

### Working with Assessments

```php
use Hanafalah\ModuleExamination\Schemas\Examination\Assessment\Assessment;
use Hanafalah\ModuleExamination\Data\AssessmentData;

$assessment = app(Assessment::class);

// Store
$dto = AssessmentData::from([...]);
$result = $assessment->storeAssessment($dto);

// Show
$result = $assessment->showAssessment($model);

// View list
$result = $assessment->viewAssessmentList();
```

### VitalSign with Expert System

The VitalSign schema includes built-in expert system logic for:
- Blood pressure classification (Normal, Elevated, Hypertension Stage 1/2, Crisis)
- Temperature classification (Normal, Low-grade fever, Fever, High fever, Critical)
- Oxygen saturation classification (Normal, Mild/Moderate/Severe Hypoxemia)

```php
// Automatic classification in prepareAfterResolve()
$assessment_exam['blood_pressure_status'] = 'HYPERTENSION';
$assessment_exam['hypertension_level'] = 'STAGE_1';
$assessment_exam['temperature_status'] = 'FEVER';
$assessment_exam['oxygen_status'] = 'MILD_HYPOXEMIA';
```

## Traits

### HasForm

Provides `form()` relationship to link models with Form records via morph.

### HasSurvey

Provides dynamic survey support:
- `getSurveyKey()` - Returns 'surveys'
- `getSurveyByFlag()` - Fetch survey by flag
- `getSurveys()` - Get survey dynamic forms

### HasPatientSummary

Auto-updates patient summary on model creation when `specific` and `patient_summary_id` are set.

### HasSurveyItem

Handles survey item processing within assessments.

## Common Development Tasks

### Adding a New Assessment Type

1. Create model in `src/Models/Examination/Assessment/`:
```php
class NewAssessment extends Assessment {
    protected $table = 'assessments';
    public $specific = ['field1', 'field2'];
}
```

2. Create contract in `src/Contracts/Schemas/Examination/Assessment/`

3. Create schema in `src/Schemas/Examination/Assessment/`:
```php
class NewAssessment extends Assessment implements ContractNewAssessment {
    protected string $__entity = 'NewAssessment';

    public function prepareStore(AssessmentData &$dto): Model {
        return parent::prepareStore($dto);
    }
}
```

4. Create resources in `src/Resources/Examination/Assessment/`

### Adding Reference Data (Stuff)

1. Create model extending appropriate base
2. Create schema in `src/Schemas/`
3. Add seeder data
4. Register in config if needed

## Testing Considerations

When testing this module:
- Test with multiple assessment types in single examination
- Verify patient summary updates correctly
- Test form/survey/screening relationships
- Verify expert system classifications in VitalSign
- Test file upload handling (PDF, base64)

## Related Modules

- `module-patient` - Patient records (Examination extends this)
- `module-transaction` - Billing/transactions
- `module-disease` - ICD codes and diagnoses
- `module-service` - Medical services
- `module-summary` - Summary records
- `ms-emr` - EMR feature module (uses this as dependency)

## Modification Checklist

Before modifying module-examination:

- [ ] Understand the schema inheritance chain (Assessment -> Examination -> ModulePatient)
- [ ] Check if changes affect the 124 models or 80 schemas
- [ ] Verify contract interfaces are updated if adding new methods
- [ ] Test memory usage after changes (due to `registers(['*'])`)
- [ ] Verify patient summary updates still work
- [ ] Test in wellmed-backbone container with Octane reload
- [ ] Ensure no static state that could leak between Octane requests
