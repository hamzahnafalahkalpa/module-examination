<?php

namespace Gii\PuskesmasModuleExamination\Models\Examination\Assessment;

use Gii\PuskesmasModuleExamination\Models\Examination\Assessment\Assessment;

class Anthropometry extends Assessment {
    protected $table = 'assessments';
    public $specific = [
        'weight', //Berat Badan
        'height', //Tinggi Badan
        'wrist_circumference', //Lingkar Pergelangan Tangan
        'head_circumference', //Lingkar Kepala
        'chest_circumference', //Lingkar Dada
        'waist_circumference', //Lingkar Pinggang
        'hip_circumference', //Lingkar Pinggul
        'arm_circumference', //Lingkar Lengan
        'calf_circumference', //Lingkar Betis
        'skinfold_thickness' //Ketebalan Lipatan Kulit
    ];
}