<?php

use Gii\ModuleExamination\Models\PatientSummary;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Zahzah\ModulePatient\Models\Patient\Patient;

return new class extends Migration
{
   use Zahzah\LaravelSupport\Concerns\NowYouSeeMe;

    private $__table;

    public function __construct(){
        $this->__table = app(config('database.models.PatientSummary', PatientSummary::class));
    }

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        $table_name = $this->__table->getTable();
        $patient = app(config('database.models.Patient',Patient::class));
        if (!$this->isColumnExists($patient->getForeignKey())){
            Schema::table($table_name, function (Blueprint $table) use ($patient){
                $table->foreignIdFor($patient::class)->after('parent_id')->index()
                      ->nullable(false)->cascadeOnUpdate()
                      ->cascadeOnDelete();
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
