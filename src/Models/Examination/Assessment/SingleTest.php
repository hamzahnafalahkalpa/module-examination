<?php

namespace Hanafalah\ModuleExamination\Models\Examination\Assessment;

use Illuminate\Database\Eloquent\Model;

class SingleTest extends Assessment
{
    protected $table = 'assessments';
    public $specific = [
        'category_id', 'score', 'summary'
    ];

    public function getAfterResolve(): Model
    {
        $exam = $this->exam;

        $category = $exam['category_id'] ?? null;
        $timeInSeconds = $exam['score'] ?? null;

        $exam['summary'] = $this->conclusion($category, $timeInSeconds);

        $this->setAttribute('exam', $exam);
        return $this;
    }

    private function conclusion(?string $category, ?int $timeInSeconds)
    {
        if (!$category || !$timeInSeconds) {
            return [
                'label' => 'Tidak Valid',
                'score' => $timeInSeconds,
                'result' => 'Kategori atau skor tidak ada.'
            ];
        }

        $thresholds = $this->getThresholds();
        $category_model = $this->SingleTestStuffModel()->findOrFail($category);
        if (!isset($thresholds[$category_model->label])) {
            return [
                'label' => 'Tidak Valid',
                'score' => $timeInSeconds,
                'result' => 'Kategori tidak ditemukan.'
            ];
        }

        foreach ($thresholds[$category_model->label] as $label => $range) {
            if (is_array($range)) {
                if ($timeInSeconds >= $range[0] && $timeInSeconds <= $range[1]) {
                    return [
                        'label' => $label,
                        'score' => $timeInSeconds,
                        'result' => "Kategori: $label"
                    ];
                }
            } else {
                // Untuk label Baik Sekali (maks) atau Kurang Sekali (min)
                if (
                    ($label === 'Baik Sekali' && $timeInSeconds <= $range) ||
                    ($label === 'Kurang Sekali' && $timeInSeconds >= $range)
                ) {
                    return [
                        'label' => $label,
                        'score' => $timeInSeconds,
                        'result' => "Kategori: $label"
                    ];
                }
            }
        }

        return [
            'label' => 'Tidak Diketahui',
            'score' => $timeInSeconds,
            'result' => 'Waktu tidak sesuai dengan rentang klasifikasi'
        ];
    }

    private function getThresholds(): array
    {
        return [
            'MALE 1000M 10-12' => [
                'Baik Sekali' => 287, // <= 4:47
                'Baik' => [288, 349],
                'Cukup' => [350, 412],
                'Kurang' => [413, 473],
                'Kurang Sekali' => 474, // >= 7:54
            ],
            'FEMALE 1000M 10-12' => [
                'Baik Sekali' => 316, // <= 5:16
                'Baik' => [317, 388],
                'Cukup' => [389, 457],
                'Kurang' => [458, 508],
                'Kurang Sekali' => 509, // >= 8:29
            ],
            'MALE 1600M 13-19' => [
                'Baik Sekali' => 443, // <= 7:23
                'Baik' => [444, 520],
                'Cukup' => [521, 598],
                'Kurang' => [599, 675],
                'Kurang Sekali' => 676, // >= 11:16
            ],
            'FEMALE 1600M 13-19' => [
                'Baik Sekali' => 569, // <= 9:29
                'Baik' => [570, 655],
                'Cukup' => [656, 741],
                'Kurang' => [742, 826],
                'Kurang Sekali' => 827, // >= 13:47
            ],
        ];
    }
}
