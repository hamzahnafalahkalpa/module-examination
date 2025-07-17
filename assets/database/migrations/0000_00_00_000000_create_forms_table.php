<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Hanafalah\ModuleExamination\Models\Form\Form;
use Hanafalah\LaravelFeature\Models\Feature\MasterFeature;

return new class extends Migration
{
    use Hanafalah\LaravelSupport\Concerns\NowYouSeeMe;

    private $__table;

    public function __construct()
    {
        $this->__table = app(config('database.models.Form', Form::class));
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
                $master_feature = app(config('database.models.MasterFeature', MasterFeature::class));

                $table->ulid('id')->primary();
                $table->string('name')->nullable(false);
                $table->string('flag')->nullable(false);
                $table->string('label')->nullable(true);
                $table->string('morph')->nullable(false)->default('')->comment('Need empty string');
                $table->integer('ordering')->default(1);
                $table->foreignIdFor($master_feature::class)->nullable()->index()
                    ->constrained()->cascadeOnUpdate()->restrictOnDelete();
                $table->json('props')->nullable();
                $table->timestamps();
                $table->softDeletes();
            });

            Schema::table($table_name, function (Blueprint $table) use ($table_name) {
                $table->foreignIdFor($this->__table::class, 'parent_id')->nullable()->after('id')->index()
                    ->constrained($table_name, $this->__table->getKeyName())
                    ->cascadeOnUpdate()->restrictOnDelete();
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
