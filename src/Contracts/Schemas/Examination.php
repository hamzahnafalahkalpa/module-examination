<?php

namespace Hanafalah\ModuleExamination\Contracts\Schemas;

use Hanafalah\LaravelSupport\Contracts\Supports\DataManagement;
use Hanafalah\ModuleExamination\Contracts\Data\ExaminationData;

interface Examination extends DataManagement
{
    public function storeExamination(?ExaminationData $examination_dto = null): array;
    public function prepareStoreExamination(ExaminationData $examination_dto): array;
}
