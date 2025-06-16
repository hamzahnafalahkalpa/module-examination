<?php

namespace Gii\PuskesmasModuleExamination\Models\Examination\Assessment;

use Gii\PuskesmasModuleExamination\Models\Examination\Assessment\Assessment;

class NeonatalEsential extends Assessment {
    protected $table = 'assessments';
    public $specific = [
        "anak_ke","weight","height","keadaan_bayi","jenis_kelamin","kondisi_bayi","penilaian_bayi","asfiksia","tindakan_dari_asfiksia","tindakan_lainnya","pemberian_asi","komplikasi_bayi","cacat_bawaan","masalah_lain","hasilnya"
    ];
}
