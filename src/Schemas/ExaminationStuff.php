<?php

namespace Hanafalah\ModuleExamination\Schemas;

use Hanafalah\ModuleExamination\Resources\ExaminationStuff\ViewExaminationStuff;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Hanafalah\LaravelSupport\Supports\PackageManagement;
use Hanafalah\ModuleExamination\Contracts\Schemas\ExaminationStuff as ContractsExaminationStuff;
use Illuminate\Support\Facades\DB;

class ExaminationStuff extends PackageManagement implements ContractsExaminationStuff
{
    protected array $__guard   = ['id'];
    protected array $__add     = ['name', 'flag', 'parent_id'];
    protected string $__entity = 'ExaminationStuff';
    public static $examination_stuff_model;

    protected array $__resources = [
        'view' => ViewExaminationStuff::class
    ];

    protected array $__cache = [
        'index' => [
            'name'     => 'examination-stuff',
            'tags'     => ['examination-stuff', 'examination-stuff-index'],
            'forever'  => true
        ]
    ];

    private function localAddSuffixCache(mixed $suffix): void
    {
        $this->addSuffixCache($this->__cache['index'], "examination-stuff-index", $suffix);
    }

    public function prepareViewExaminationStuffList(mixed $flag, mixed $attributes = null): Collection
    {
        $attributes ??= request()->all();
        $this->localAddSuffixCache(implode('-', $this->mustArray($flag)));
        return $this->cacheWhen(!$this->isSearch(), $this->__cache['index'], function () use ($flag, $attributes) {
            return $this->examinationStuff($flag)->get();
        });
    }

    public function viewExaminationStuffList(mixed $flag): array
    {
        return $this->transforming($this->__resources['view'], function () use ($flag) {
            return $this->prepareViewExaminationStuffList($flag);
        });
    }

    public function viewMultipleExaminationStuffList(mixed $flags): array
    {
        $flags = $this->mustArray($flags);
        $response = [];
        foreach ($flags as $flag) {
            $response[$flag] = $this->transforming($this->__resources['view'], function () use ($flag) {
                return $this->prepareViewExaminationStuffList($flag);
            });
        }
        return $response;
    }

    public function getExaminationStuff(): mixed
    {
        return static::$examination_stuff_model;
    }

    public function examinationStuff(mixed $flag, mixed $conditionals = null): Builder
    {
        $this->booting();
        $flag = $this->mustArray($flag);
        return $this->ExaminationStuffModel()->flagIn($flag)->with('childs')
            ->conditionals($conditionals)
            ->orderBy(DB::raw("IFNULL(JSON_EXTRACT(props, '$.ordering'), 1)"), 'asc')
            ->orderBy('name', 'asc');
    }
}
