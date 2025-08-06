<?php

namespace Hanafalah\ModuleExamination\Models\Examination\Assessment;

use Hanafalah\ModuleExamination\Models\Examination\Assessment\Assessment;
use Illuminate\Database\Eloquent\Model;

class HemoglobinTest extends Assessment {
    protected $table = 'assessments';
    public $specific = [
        'category', 'hb_value', 'summary'
    ];

    public function getAfterResolve(): Model {
        $exam = $this->exam;
        $exam['summary'] = $this->conclusion($exam['hb_value'], $exam['category'] ?? null);
        $this->setAttribute('exam', $exam);
        return $this;
    }

    private function conclusion($hb, $category = null) {
        $arr = [];

        switch (strtolower($category)) {
            case 'bayi baru lahir': // 14–24 g/dL
                if ($hb >= 14 && $hb <= 24) $arr = ['Normal', 3, 'Rentang Hb normal untuk bayi baru lahir (14–24 g/dL)'];
                elseif ($hb < 14) $arr = ['Anemia', 1, 'Hb di bawah normal untuk bayi baru lahir'];
                elseif ($hb > 24) $arr = ['Polisitemia', 2, 'Hb di atas normal untuk bayi baru lahir'];
                break;

            case 'bayi': // 0.5–6 bulan, 10–17 g/dL
                if ($hb >= 10 && $hb <= 17) $arr = ['Normal', 3, 'Rentang Hb normal untuk bayi usia 0.5–6 bulan (10–17 g/dL)'];
                elseif ($hb < 10) $arr = ['Anemia', 1, 'Hb di bawah normal untuk bayi'];
                elseif ($hb > 17) $arr = ['Polisitemia', 2, 'Hb di atas normal untuk bayi'];
                break;

            case 'anak kecil': // 6 bulan–6 tahun, 11–13 g/dL
                if ($hb >= 11 && $hb <= 13) $arr = ['Normal', 3, 'Rentang Hb normal untuk anak usia 6 bulan–6 tahun (11–13 g/dL)'];
                elseif ($hb < 11) $arr = ['Anemia', 1, 'Hb di bawah normal untuk anak kecil'];
                elseif ($hb > 13) $arr = ['Polisitemia', 2, 'Hb di atas normal untuk anak kecil'];
                break;

            case 'anak': // 6–14 tahun, 12–15 g/dL
                if ($hb >= 12 && $hb <= 15) $arr = ['Normal', 3, 'Rentang Hb normal untuk anak usia 6–14 tahun (12–15 g/dL)'];
                elseif ($hb < 12) $arr = ['Anemia', 1, 'Hb di bawah normal untuk anak'];
                elseif ($hb > 15) $arr = ['Polisitemia', 2, 'Hb di atas normal untuk anak'];
                break;

            case 'laki-laki dewasa': // 13–17 g/dL
                if ($hb >= 13 && $hb <= 17) $arr = ['Normal', 3, 'Rentang Hb normal untuk laki-laki dewasa (13–17 g/dL)'];
                elseif ($hb < 13) $arr = ['Anemia', 1, 'Hb di bawah normal untuk laki-laki dewasa'];
                elseif ($hb > 17) $arr = ['Polisitemia', 2, 'Hb di atas normal untuk laki-laki dewasa'];
                break;

            case 'perempuan dewasa': // 12–15 g/dL
                if ($hb >= 12 && $hb <= 15) $arr = ['Normal', 3, 'Rentang Hb normal untuk perempuan dewasa (12–15 g/dL)'];
                elseif ($hb < 12) $arr = ['Anemia', 1, 'Hb di bawah normal untuk perempuan dewasa'];
                elseif ($hb > 15) $arr = ['Polisitemia', 2, 'Hb di atas normal untuk perempuan dewasa'];
                break;

            case 'ibu hamil': // ≥11 g/dL
                if ($hb >= 11) $arr = ['Normal', 3, 'Rentang Hb normal untuk ibu hamil (≥11 g/dL)'];
                elseif ($hb < 11 && $hb >= 8) $arr = ['Anemia ringan–sedang', 1, 'Hb di bawah normal untuk ibu hamil'];
                elseif ($hb < 8) $arr = ['Anemia berat', 0, 'Hb sangat rendah untuk ibu hamil'];
                break;

            default:
                // Jika category tidak dikenali
                $arr = ['Tidak diketahui', null, 'category tidak dikenali atau tidak diisi'];
                break;
        }

        return [
            'label'  => $arr[0] ?? null,
            'score'  => $arr[1] ?? null,
            'result' => $arr[2] ?? null
        ];
    }
}
