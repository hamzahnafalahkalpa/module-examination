<?php

use Hanafalah\ModuleExamination\Models\Examination\Assessment\Diagnose\Diagnose;
use Hanafalah\ModulePatient\Models\EMR\ExaminationSummary;
use Hanafalah\ModuleExamination\Models\PatientSummary;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Hanafalah\LaravelSupport\Concerns\NowYouSeeMe;
use Hanafalah\ModulePatient\Models\EMR\VisitExamination;

return new class extends Migration
{
    use NowYouSeeMe;

    private $__table;

    public function __construct()
    {
        $this->__table = app(config('database.models.Diagnose', Diagnose::class));
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

                $table->ulid("id")->primary();
                $table->foreignIdFor($visit_examination::class)
                    ->nullable()->index('ve_dg')->constrained()
                    ->cascadeOnUpdate()->restrictOnDelete();

                $table->foreignIdFor($examination_summary::class)
                    ->nullable()->index('es_dg')->constrained()
                    ->cascadeOnUpdate()->restrictOnDelete();

                $table->foreignIdFor($patient_summary::class)
                    ->nullable()->index('pt_dg')->constrained('summaries')
                    ->cascadeOnUpdate()->restrictOnDelete();

                $table->json('props')->nullable();
                $table->timestamps();
                $table->softDeletes();
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
