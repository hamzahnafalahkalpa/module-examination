<?php

namespace Hanafalah\ModuleExamination;

use Hanafalah\LaravelSupport\Providers\BaseServiceProvider;

class ModuleExaminationServiceProvider extends BaseServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(){
        $this->registerMainClass(ModuleExamination::class)
            ->registerCommandService(Providers\CommandServiceProvider::class)
            ->registers(['*']);
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
