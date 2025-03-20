<?php

namespace Hanafalah\ModuleExamination\Models\Examination\Assessment\MedicalSupport;

class RadiologySupport extends TrxMedicalSupport
{
    protected $table = 'assessments';

    public $specific = [
        'name',
        'data_source',          // Asal Data Expertise
        'responsible_person',   // Penanggung Jawab
        'responsible_doctor',   // Dokter Penanggung Jawab
        'phone',                // Telepon
        'examination_date',     // Tanggal Pemeriksaan
        'institution',          // Instansi
        'address',              // Alamat
        'examination_name',     // Nama Pemeriksaan
        'interpretation',       // Interpretasi
        'paths'
    ];
}
