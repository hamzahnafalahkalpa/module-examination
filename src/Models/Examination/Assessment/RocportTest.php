<?php

namespace Hanafalah\ModuleExamination\Models\Examination\Assessment;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class RocportTest extends Assessment
{
    protected $table = 'assessments';

    public $specific = [
        'score', 'weight', 'age', 'sex', 'heart_rate', 'summary'
    ];

    public function getAfterResolve(): Model
    {
        $exam = $this->exam;
        $timeInSeconds = $exam['score'] ?? null;
        $weight = $exam['weight'] ?? null; // dalam lbs
        $age = $exam['age'] ?? null;
        $sex = $exam['sex'] ?? null; // 'male' atau 'female'
        if (isset($sex)) $sex = Str::title($sex);
        $heartRate = $exam['heart_rate'] ?? null;
        if (!$timeInSeconds || !$weight || !$age || !$sex || !$heartRate) {
            $exam['summary'] = [
                'label' => 'Tidak Valid',
                'result' => 'Data kategori, waktu, berat, usia, sex, atau denyut jantung tidak lengkap.'
            ];
            $this->setAttribute('exam', $exam);
            return $this;
        }

        // Hitung VO2 max dari data input
        $vo2Max = $this->calculateVO2Max($weight, $age, $sex, $timeInSeconds, $heartRate);

        // Klasifikasikan VO2 max berdasarkan kategori dan threshold
        $label = $this->classifyVO2Max($vo2Max, $age, $sex);

        $exam['summary'] = [
            'vo2max' => round($vo2Max, 2),
            'label' => $label,
            'result' => "Kategori kebugaran: $label berdasarkan VO2 Max = ".round($vo2Max, 2)." ml/kg/min"
        ];

        $this->setAttribute('exam', $exam);
        return $this;
    }

    private function calculateVO2Max($weightLbs, $age, $sex, $timeSeconds, $heartRate)
    {
        // sex faktor 1 = male, 0 = female
        $sexFactor = ($sex === 'Male') ? 6.315 : 0;

        $timeMinutes = $timeSeconds / 60;
        // Rumus Rockport VO2 Max
        $vo2Max = 132.853
            - (0.0769 * $weightLbs)
            - (0.3877 * $age)
            + ($sexFactor)
            - (3.2649 * $timeMinutes)
            - (0.1565 * $heartRate);

        return $vo2Max;
    }

    private function classifyVO2Max($vo2Max, $age, $sex)
    {
        $classification = 'Tidak Diketahui';

        $thresholds = $this->getVO2MaxThresholds();

        // Tentukan rentang umur kategori yg paling mendekati
        $ageGroup = null;
        foreach (array_keys($thresholds[$sex]) as $range) {
            [$min, $max] = explode('-', $range);
            if ($age >= intval($min) && $age <= intval($max)) {
                $ageGroup = $range;
                break;
            }
        }

        if (!$ageGroup) {
            return 'Usia tidak tersedia dalam kategori';
        }

        foreach ($thresholds[$sex][$ageGroup] as $label => [$min, $max]) {
            if ($vo2Max >= $min && $vo2Max <= $max) {
                $classification = $label;
                break;
            }
        }

        return $classification;
    }

    private function getVO2MaxThresholds()
    {
        // Struktur thresholds VO2 Max (ml/kg/min) berdasar sex & kelompok umur
        // Sumber: Verywellfit dan ACSM standar Rocport test
        return [
            'Male' => [
                '13-19' => [
                    'Sangat Baik' => [55.9, 100],
                    'Baik' => [51.0, 55.9],
                    'Rata-rata' => [45.2, 50.9],
                    'Di Bawah Rata-rata' => [38.4, 45.1],
                    'Kurang' => [35.0, 38.3],
                    'Sangat Kurang' => [0, 34.9],
                ],
                '20-29' => [
                    'Sangat Baik' => [52.4, 100],
                    'Baik' => [46.5, 52.4],
                    'Rata-rata' => [42.5, 46.4],
                    'Di Bawah Rata-rata' => [36.5, 42.4],
                    'Kurang' => [33.0, 36.4],
                    'Sangat Kurang' => [0, 32.9],
                ],
                // Tambah kelompok umur lain sesuai kebutuhan
            ],
            'Female' => [
                '13-19' => [
                    'Sangat Baik' => [41.9, 100],
                    'Baik' => [39.0, 41.9],
                    'Rata-rata' => [35.0, 38.9],
                    'Di Bawah Rata-rata' => [31.0, 34.9],
                    'Kurang' => [29.0, 32.9],
                    'Sangat Kurang' => [0, 28.9],
                ],
                '20-29' => [
                    'Sangat Baik' => [41.0, 100],
                    'Baik' => [37.0, 41.0],
                    'Rata-rata' => [33.0, 36.9],
                    'Di Bawah Rata-rata' => [29.0, 32.9],
                    'Kurang' => [23.6, 28.9],
                    'Sangat Kurang' => [0, 23.5],
                ],
                // Tambah kelompok umur lain sesuai kebutuhan
            ],
        ];
    }
}
