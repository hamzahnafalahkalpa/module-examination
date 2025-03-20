<?php

namespace Gii\ModuleExamination\Contracts;

use Illuminate\Database\Eloquent\Model;
use Zahzah\LaravelSupport\Contracts\DataManagement;

interface Examination extends DataManagement{
    public function addScreenings(array $attributes): array;
    public function storeBulkStoreExamination(): array;
    public function prepareBulkStoreExamination(? array $attributes = null): array;
    public function addPractitioner(? array $attributes = null) : Model;
    public function commitExamination(): array;
}
