<?php

use Hanafalah\ModuleExamination\Models\Form\Form;
use Hanafalah\ModuleExamination\Models\Form\FormHasAnatomy;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Hanafalah\ModuleAnatomy\Models\Anatomy;

return new class extends Migration
{
    use Hanafalah\LaravelSupport\Concerns\NowYouSeeMe;

    

    public function __construct()
    {
        $this->__table = app(config('database.models.FormHasAnatomy', FormHasAnatomy::class));
    }

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        $table_name = $this->__table->getTable();
        if (!$this->isTableExists()) {
            Schema::create($table_name, function (Blueprint $table) {
                $form    = app(config('database.models.Form', Form::class));
                $anatomy = app(config('database.models.Anatomy', Anatomy::class));

                $table->ulid('id')->primary();
                $table->foreignIdFor($form::class)->nullable(false)
                    ->index()->constrained()->cascadeOnUpdate()
                    ->cascadeOnDelete();

                $table->foreignIdFor($anatomy::class)->nullable(false)
                    ->index()->constrained()->cascadeOnUpdate()
                    ->cascadeOnDelete();

                $table->json('props')->nullable(true);
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists($this->__table->getTable());
    }
};
