<?php

namespace Hanafalah\ModuleExamination\Contracts\Examination;

use Hanafalah\ModuleExamination\Contracts\Examination as ContractsExamination;

/**
 * @see \Hanafalah\ModuleExamination\Schemas\ExaminationTreatment
 * @method self setParamLogic(string $logic, bool $search_value = false, ?array $optionals = [])
 * @method self conditionals(mixed $conditionals)
 * @method bool deleteExaminationTreatment()
 * @method bool prepareDeleteExaminationTreatment(? array $attributes = null)
 * @method mixed getExaminationTreatment()
 * @method ?Model prepareShowExaminationTreatment(?Model $model = null, ?array $attributes = null)
 * @method array showExaminationTreatment(?Model $model = null)
 * @method Collection prepareViewExaminationTreatmentList()
 * @method array viewExaminationTreatmentList()
 * @method LengthAwarePaginator prepareViewExaminationTreatmentPaginate(PaginateData $paginate_dto)
 * @method array viewExaminationTreatmentPaginate(?PaginateData $paginate_dto = null)
 * @method array storeExaminationTreatment(?ExaminationTreatmentData $funding_dto = null)
 * @method Builder examinationTreatment(mixed $conditionals = null)
 */
interface ExaminationTreatment extends ContractsExamination {}
