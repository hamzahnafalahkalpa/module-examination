<?php

namespace Hanafalah\ModuleExamination\Models\Examination\Assessment;

use Hanafalah\ModuleExamination\Concerns\HasSurvey;

class ANCTerpadu extends Assessment{
    use HasSurvey;

    protected $table  = 'assessments';
    public $specific  = [
        'result','hpht','hpl','detak_jantung_janin',
        'lingkar_lengan_atas','kehamilan_ke','jumlah_persalinan',
        'jarak_persalinan_terakhir','jumlah_anak_hidup','jumlah_anak_lahir_mati',
        'umur_helamilan','tinggi_fundus','kaki_bengkak','posisi_bayi','surveys'
    ];

    protected function getSurveyFlag(): ?string {
        return 'ANCTerpadu';
    }
}
