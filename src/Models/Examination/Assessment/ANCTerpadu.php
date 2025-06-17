<?php

namespace Hanafalah\ModuleExamination\Models\Examination\Assessment;

use Hanafalah\ModuleExamination\Concerns\HasSurvey;
use Illuminate\Database\Eloquent\Model;

class ANCTerpadu extends Assessment{
    use HasSurvey;

    protected $table  = 'assessments';
    public $specific  = [
        'result','hpht','hpl','detak_jantung_janin','lingkar_lengan_atas','kehamilan_ke','jumlah_persalinan','jarak_persalinan_terakhir','jumlah_anak_hidup','jumlah_anak_lahir_mati','umur_helamilan','tinggi_fundus','kaki_bengkak','posisi_bayi','surveys'
    ];

    protected function getSurveyFlag(): ?string {
        return 'ANCTerpadu';
    }

    public function getAfterResolve(): Model{
        $dynamic_forms = $this->surveys;
        $new_surveys   = $this->getSurveyByFlag()->dynamic_forms;
        $results = 0;
        foreach ($dynamic_forms as $dynamic_form) {
            if (isset($dynamic_form[$dynamic_form['key']],$dynamic_form[$dynamic_form['key']]['value'])){
                $results += $dynamic_form[$dynamic_form['key']]['value'];
                $new_surveys[$dynamic_form['key']]['value'] = $dynamic_form[$dynamic_form['key']];
            }
        }
        $this->result = $results;
        $this->setAttribute('surveys',$new_surveys);
        $this->save();
        return $this;
    }
}
