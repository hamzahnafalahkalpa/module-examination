<?php

namespace Hanafalah\ModuleExamination\Contracts;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Hanafalah\LaravelSupport\Contracts\DataManagement;

interface ExaminationStuff extends DataManagement
{
    public function prepareViewExaminationStuffList(mixed $flag, mixed $attributes = null): Collection;
    public function viewExaminationStuffList(mixed $flag): array;
    public function viewMultipleExaminationStuffList(mixed $flags): array;
    public function getExaminationStuff(): mixed;
    public function examinationStuff(mixed $flag, mixed $conditionals = null): Builder;
}
