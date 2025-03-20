<?php

use Hanafalah\ModuleExamination\Models\Examination\Assessment\Assessment;
use Hanafalah\ModulePatient\Models\EMR\ExaminationSummary;
use Hanafalah\ModuleExamination\Models\PatientSummary;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Hanafalah\ModulePatient\Models\EMR\VisitExamination;

return new class extends Migration
{
    use Hanafalah\LaravelSupport\Concerns\NowYouSeeMe;

    private $__table;

    public function __construct()
    {
        $this->__table = app(config('database.models.Assessment', Assessment::class));
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
                $visit_examination   = app(config('database.models.VisitExamination', VisitExamination::class));
                $examination_summary = app(config('database.models.ExaminationSummary', ExaminationSummary::class));
                $patient_summary     = app(config('database.models.PatientSummary', PatientSummary::class));

                $table->ulid("id")->primary()->collation("utf8mb4_bin");

                $table->foreignIdFor($visit_examination::class)
                    ->nullable()->index('ve_as')->constrained()
                    ->cascadeOnUpdate()->restrictOnDelete();

                $table->foreignIdFor($examination_summary::class)->collation("utf8mb4_bin")
                    ->nullable()->index('es_as')->constrained()
                    ->cascadeOnUpdate()->restrictOnDelete();

                $table->foreignIdFor($patient_summary::class)
                    ->nullable()->index('ps_as')->constrained('summaries')
                    ->cascadeOnUpdate()->restrictOnDelete();

                $table->string('morph', 50)->nullable();
                $table->json('props')->nullable();
                $table->timestamps();
                $table->softDeletes();
            });

            Schema::table($table_name, function (Blueprint $table) use ($table_name) {
                $table->foreignIdFor($this->__table, 'parent_id')
                    ->nullable()->after('id')
                    ->index()->constrained($table_name)
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
