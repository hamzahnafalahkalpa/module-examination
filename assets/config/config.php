<?php

use Hanafalah\ModuleExamination\{
    Schemas\Examination\Assessment,
    Contracts, Commands
};

return [
    'namespace' => 'Hanafalah\\ModuleExamination',
    'app' => [
        'contracts' => [
            //ADD YOUR CONTRACTS HERE
        ]
    ],
    'libs' => [
        'model' => 'Models',
        'contract' => 'Contracts',
        'schema' => 'Schemas',
        'database' => 'Database',
        'data' => 'Data',
        'resource' => 'Resources',
        'migration' => '../assets/database/migrations'
    ],
    'database' => [
        'models' => [

        ]
    ],
    'examinations' => [
        'PainScale' => [
            'schema' => Assessment\PainScale::class,
            'libs'   => [
                'Wong-Baker Faces Pain Scale',
                'Numerical Rating Scale',
                'Faces Pain Scale',
                'Visual Analog Scale'
            ],
            'type' => 0
        ]
    ],
    'commands' => [
        Commands\InstallMakeCommand::class
    ],
    'patient_summary_libs' => [
        //ADD YOUR LIBS HERE AS STRING
        //ex: HIV_AIDS in HUMAN DISEASE, ENGINE TROUBLE in ENGINE DISEASE, etc
    ],
    'warehouse' => null
];
