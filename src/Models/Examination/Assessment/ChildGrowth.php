<?php

namespace Gii\PuskesmasModuleExamination\Models\Examination\Assessment;

class ChildGrowth extends Assessment{

    protected $table  = 'object';
    public $response_model = 'array';
    public $specific  = [
        // Pemeriksaan Tumbuh Kembang Anak
        'pb_tb_by_age',
        // Perkembangan Anak
        // Pemeliharaan Atas Indikasi/Jika ada Keluhan
        'gpph','autisme',
        // Tindakan Intervensi
        'stimulation_counseling','development_intervention'

    ];
}
