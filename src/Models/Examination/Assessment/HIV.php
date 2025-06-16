<?php

namespace Gii\PuskesmasModuleExamination\Models\Examination\Assessment;

use Gii\PuskesmasModuleExamination\Concerns\HasSurvey;
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

    public function getAfterResolve(): Model{
        $dynamic_forms = $this->surveys;
        $new_surveys   = $this->getSurveyByFlag()->dynamic_forms;
        foreach ($dynamic_forms as $dynamic_form) {
            if (isset($dynamic_form[$dynamic_form['key']],$dynamic_form[$dynamic_form['key']]['value'])){
                $new_surveys[$dynamic_form['key']]['value'] = $dynamic_form[$dynamic_form['key']];
            }
        }
        $this->setAttribute('surveys',$new_surveys);
        $this->save();
        return $this;
    }
}
