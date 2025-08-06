<?php

namespace Hanafalah\ModuleExamination\Models\Examination\Assessment;

use Hanafalah\ModuleExamination\Concerns\HasSurvey;
use Hanafalah\ModuleExamination\Models\Examination\Assessment\Assessment;
use Illuminate\Database\Eloquent\Model;

class MorseFallScale extends Assessment {
    use HasSurvey;

    protected $table = 'assessments';
    public $specific = [
        'surveys', 'summary'
    ];

    protected function getSurveyFlag(): ?string {
        return 'MorseFallScale';
    }

    public function getAfterResolve(): Model{
        $exam = $this->exam;
        $dynamic_forms = $exam['surveys'];
        $results       = 0;
        foreach ($dynamic_forms as $dynamic_form) {
            if (isset($dynamic_form[$dynamic_form['key']],$dynamic_form[$dynamic_form['key']]['value'])){
                $results += $dynamic_form[$dynamic_form['key']]['value'];
            }
        }
        $exam['summary'] = $this->conclusion($results);
        $this->setAttribute('exam',$exam);
        return $this;
    }

    private function conclusion($calc) {
        switch (true) {
            case $calc >= 45:
                $arr = ['Risiko Tinggi', $calc, "{$calc} | Risiko jatuh tinggi, butuh intervensi ketat dan pemantauan terus-menerus"];
                break;
            case $calc >= 25 && $calc <= 44:
                $arr = ['Risiko Sedang', $calc, "{$calc} | Risiko jatuh sedang, lakukan intervensi pencegahan"];
                break;
            case $calc >= 0 && $calc <= 24:
                $arr = ['Risiko Rendah', $calc, "{$calc} | Risiko jatuh rendah, pantau rutin dan edukasi pasien"];
                break;
            default:
                $arr = ['Tidak Valid', $calc, "{$calc} | Skor tidak dikenali"];
                break;
        }

        return [
            'label'  => $arr[0],
            'score'  => $arr[1],
            'result' => $arr[2]
        ];
    }

}
