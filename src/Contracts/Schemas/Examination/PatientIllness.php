<?php

namespace Hanafalah\ModuleExamination\Contracts\Schemas\Examination;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Hanafalah\ModuleExamination\Contracts\Schemas\Examination as ContractsExamination;

/**
 * @see \Hanafalah\ModuleExamination\Schemas\PatientIllness
 * @method self setParamLogic(string $logic, bool $search_value = false, ?array $optionals = [])
 * @method self conditionals(mixed $conditionals)
 * @method bool deletePatientIllness()
 * @method bool prepareDeletePatientIllness(? array $attributes = null)
 * @method mixed getPatientIllness()
 * @method ?Model prepareShowPatientIllness(?Model $model = null, ?array $attributes = null)
 * @method array showPatientIllness(?Model $model = null)
 * @method Collection prepareViewPatientIllnessList()
 * @method array viewPatientIllnessList()
 * @method LengthAwarePaginator prepareViewPatientIllnessPaginate(PaginateData $paginate_dto)
 * @method array viewPatientIllnessPaginate(?PaginateData $paginate_dto = null)
 * @method array storePatientIllness(?PatientIllnessData $funding_dto = null)
 * @method Builder examinationTreatment(mixed $conditionals = null)
 */
interface PatientIllness extends ContractsExamination
{
}
