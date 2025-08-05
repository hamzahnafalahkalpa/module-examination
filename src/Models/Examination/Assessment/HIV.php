<?php

namespace Hanafalah\ModuleExamination\Models\Examination\Assessment;

use Hanafalah\ModuleExamination\Concerns\HasSurvey;
use Illuminate\Database\Eloquent\Model;

class HIV extends Assessment{
    use HasSurvey;

    protected $table  = 'assessments';
    public $specific  = [
        // FORMULIR
        'punya_pasangan','apakah_pasangan_hamil','nama_pasangan','status_pasangan',
        // Kelompok Risiko
        'kelompok_risiko','tanggal_kelompok_risiko',
        // Populasi Khusus
        'wbp',
        // Konseling Pra Test
        'status_klien','alasan_tes_hiv','mengetahui_adanya_test',
        // Kajian Tingkat Risiko
        'surveys'

    ];

    protected function getSurveyFlag(): ?string {
        return 'HIV';
    }
}
