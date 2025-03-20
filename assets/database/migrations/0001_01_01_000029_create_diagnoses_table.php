<?php

use Gii\ModuleExamination\Models\Examination\Assessment\Diagnose\Diagnose;
use Zahzah\ModulePatient\Models\EMR\ExaminationSummary;
use Gii\ModuleExamination\Models\PatientSummary;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Zahzah\LaravelSupport\Concerns\NowYouSeeMe;
use Zahzah\ModulePatient\Models\EMR\VisitExamination;

return new class extends Migration
{
   use NowYouSeeMe;

    private $__table;

    public function __construct(){
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
        if (!$this->isTableExists()){
            Schema::create($table_name, function (Blueprint $table) {
                $visit_examination   = app(config('database.models.VisitExamination', VisitExamination::class)); 
                $examination_summary = app(config('database.models.ExaminationSummary', ExaminationSummary::class)); 
                $patient_summary     = app(config('database.models.PatientSummary', PatientSummary::class)); 
                
                $table->ulid("id")->primary()->collation("utf8mb4_bin");
                $table->foreignIdFor($visit_examination::class)
                    ->nullable()->index('ve_dg')->constrained()
                    ->cascadeOnUpdate()->restrictOnDelete();

                $table->foreignIdFor($examination_summary::class)->collation("utf8mb4_bin")
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
