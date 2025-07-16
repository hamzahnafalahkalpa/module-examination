<?php

namespace Hanafalah\ModuleExamination\Models\Examination\Assessment;

class PainScale extends Assessment {
    protected $table = 'assessments';
    public $specific = [
        'rating_scale'
    ];

    public function getExamResults($model): array{
        $exam = $model->exam;
        return [
            'rating_scale' => $exam['rating_scale'],
            'scale_result' => $this->getResult($exam['rating_scale'])
        ];
    }

    public function getResult(int $scale): string{
        $pain_config = config('puskesmas-module-examination.examinations.'.$this->getMorphClass());
        $method      = $pain_config['type']; 
        switch ($method) {
            case 0: return $this->getWongBakerPainScaleResult($scale);break;
            case 1: return $this->getNumericalRatingScale($scale);break;
            case 2: return $this->getFacesPainScaleResult($scale);break;
            case 3: return $this->getVisualAnalogScaleResult($scale);break;
        }
        return '';
    }


    public function getVisualAnalogScaleResult(int $scale): string{
        switch ($scale) {
            case 0: return 'Tidak Ada Nyeri'; break;
            case 1:
            case 2:
            case 3: return 'Nyeri Ringan'; break;
            case 4:
            case 5:
            case 6: return 'Nyeri Sedang'; break;
            case 7:
            case 8: return 'Nyeri Lebih Berat'; break;
            case 9:
            case 10: return 'Nyeri Paling Berat'; break;
        }
        return '';
    }

    public function getFacesPainScaleResult(int $scale): string{
        switch ($scale) {
            case 0: return 'Tidak Ada Nyeri (wajah senyum)'; break;
            case 1:
            case 2: return 'Nyeri Ringan (wajah sedikit sedih)'; break;
            case 3:
            case 4: return 'Nyeri Sedang (wajah sedih)'; break;
            case 5:
            case 6: return 'Nyeri Lebih Berat (wajah sangat sedih)'; break;
            case 7:
            case 8: return 'Nyeri Sangat Berat (wajah menangis)'; break;
            case 9:
            case 10: return 'Nyeri Paling Berat (wajah sangat menangis)'; break;
        }
        return '';
    }

    public function getNumericalRatingScale(int $scale): string{
        switch ($scale) {
            case 0: return 'Tidak Ada Nyeri (No Pain)'; break;
            case 1:
            case 2:
            case 3: return 'Nyeri Ringan (Mild Pain)'; break;
            case 4:
            case 5:
            case 6: return 'Nyeri Sedang (Moderate Pain)'; break;
            case 7:
            case 8: return 'Nyeri Lebih Berat (Severe Pain)'; break;
            case 9:
            case 10: return 'Nyeri Paling Berat (Worst Pain Possible)'; break;
        }
        return '';
    }

    public function getWongBakerPainScaleResult(int $scale): string{
        switch ($scale) {
            case 0: return 'Tidak Ada Nyeri (No Hurt)';break;
            case 1:
            case 2: return 'Nyeri Ringan (Hurst Little Bit)';break;
            case 3:
            case 4: return 'Nyeri Sedang (Hurst Little More)';break;
            case 5:
            case 6: return 'Nyeri Lebih Berat (Hurts Even More)';break;
            case 7:
            case 8: return 'Nyeri Sangat Berat (Hurts Whole Lot)';break;
            case 9:
            case 10: return 'Nyeri Paling Berat (Hurts Worst)';break;
        }
        return '';
    }
}