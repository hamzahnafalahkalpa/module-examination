<?php

namespace Hanafalah\ModuleExamination\Seeders;

use Hanafalah\ModuleExamination\Models\MasterVaccine;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class MasterVaccineSeeder extends Seeder
{
    public function run()
    {
        $master_vaccine = app(config('database.models.MasterVaccine', MasterVaccine::class));

        $vaccine_lists = [
            'Hepatitis A',
            'Hepatitis B',
            'Influenza',
            'Measles, Rubella (MR)',
            'Measles, Mumps, Rubella (MMR)',
            'Pneumococcal conjugate vaccines (PCV)',
            'Polio (OPV/IPV)',
            'Rabies',
            'Tetanus, Diphtheria (TD)',
            'Twinrix Combo HAV, HBV',
            'Typhoid',
            'Varicella',
            'Yellow Fever',
            'HPV',
            'Tetanus (TT)',
            'Dengue Fever',
            'Tetanus, Diphtheria, Pertussis (TDAP/DPT)',
            'Meningitis',
            'Dengue',
            'Haemophilus influenzae type B (HIB)',
            'Rotavirus',
            'BCG',
            'COVID',
            'Japanese Encephalitis'
        ];

        foreach ($vaccine_lists as $vaccine) {
            $master_vaccine->firstOrCreate([
                'name'          => $vaccine,
                'update_able'   => false
            ]);
        }
    }
}
