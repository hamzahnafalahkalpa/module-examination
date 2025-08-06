<?php

namespace Hanafalah\ModuleExamination\Models\Examination\Assessment;

use Illuminate\Database\Eloquent\Model;

class RocportTest extends Assessment{
    protected $table  = 'assessments';
    public $specific  = [
        'score','summary'
    ];


    public function getAfterResolve(): Model{
        $exam = $this->exam;
        $exam['summary'] = $this->conclusion($exam['score']);
        $this->setAttribute('exam',$exam);
        return $this;
    }

    private function conclusion($calc)
    {
        $menit = (int) $calc;

        switch (true) {
            case ($menit >= 40 && $menit <= 60):
                $arr = [
                    'Baik / Baik Sekali',
                    $menit,
                    'Frekuensi 4-5x/minggu, denyut nadi 140-150 x/menit, durasi 40-60 menit, aerobik tipe 1, 2, 3'
                ];
            break;
            case ($menit >= 30 && $menit < 40):
                $arr = [
                    'Cukup',
                    $menit,
                    'Frekuensi 3x/minggu, denyut nadi 120-140 x/menit, durasi 30-40 menit, aerobik tipe 2'
                ];
            break;
            case ($menit >= 20 && $menit < 30):
                $arr = [
                    'Kurang / Kurang Sekali',
                    $menit,
                    'Frekuensi 2x/minggu, denyut nadi 100-120 x/menit, durasi 20-30 menit, aerobik tipe 1'
                ];
            break;
            default:
                $arr = [
                    'Tidak Valid',
                    $menit,
                    'Waktu di luar rentang 20-60 menit. Silakan masukkan nilai antara 20-60.'
                ];
            break;
        }

        return [
            'label' => $arr[0],
            'score' => $arr[1],
            'result' => $arr[2]
        ];
    }
}
