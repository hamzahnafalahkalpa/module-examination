<?php

namespace Hanafalah\ModuleExamination\Contracts\Schemas;

use Hanafalah\ModuleExamination\Contracts\Data\PatientSummaryData;
//use Hanafalah\ModuleExamination\Contracts\Data\PatientSummaryUpdateData;
use Hanafalah\LaravelSupport\Contracts\Supports\DataManagement;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * @see \Hanafalah\ModuleExamination\Schemas\PatientSummary
 * @method mixed export(string $type)
 * @method self conditionals(mixed $conditionals)
 * @method array updatePatientSummary(?PatientSummaryData $patient_summary_dto = null)
 * @method Model prepareUpdatePatientSummary(PatientSummaryData $patient_summary_dto)
 * @method bool deletePatientSummary()
 * @method bool prepareDeletePatientSummary(? array $attributes = null)
 * @method mixed getPatientSummary()
 * @method ?Model prepareShowPatientSummary(?Model $model = null, ?array $attributes = null)
 * @method array showPatientSummary(?Model $model = null)
 * @method Collection prepareViewPatientSummaryList()
 * @method array viewPatientSummaryList()
 * @method LengthAwarePaginator prepareViewPatientSummaryPaginate(PaginateData $paginate_dto)
 * @method array viewPatientSummaryPaginate(?PaginateData $paginate_dto = null)
 * @method array storePatientSummary(?PatientSummaryData $patient_summary_dto = null)
 * @method Collection prepareStoreMultiplePatientSummary(array $datas)
 * @method array storeMultiplePatientSummary(array $datas)
 */

interface PatientSummary extends DataManagement
{
    public function prepareStorePatientSummary(PatientSummaryData $patient_summary_dto): Model;
}