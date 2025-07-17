<?php

namespace Hanafalah\ModuleExamination\Contracts\Schemas\Examination\Assessment;

use Hanafalah\ModuleExamination\Contracts\Schemas\Examination;

/**
 * @see \Hanafalah\ModuleExamination\Schemas\Assessment
 * @method self setParamLogic(string $logic, bool $search_value = false, ?array $optionals = [])
 * @method self conditionals(mixed $conditionals)
 * @method mixed export(string $type)
 * @method bool deleteAssessment()
 * @method bool prepareDeleteAssessment(? array $attributes = null)
 * @method mixed getAssessment()
 * @method ?Model prepareShowAssessment(?Model $model = null, ?array $attributes = null)
 * @method array showAssessment(?Model $model = null)
 * @method Collection prepareViewAssessmentList()
 * @method array viewAssessmentList()
 * @method LengthAwarePaginator prepareViewAssessmentPaginate(PaginateData $paginate_dto)
 * @method array viewAssessmentPaginate(?PaginateData $paginate_dto = null)
 * @method array storeAssessment(?AssessmentData $assessment_dto = null)
 */
interface Assessment extends Examination{}
