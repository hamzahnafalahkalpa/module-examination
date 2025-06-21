<?php

return [
    'namespace' => 'Hanafalah\ModuleExamination',
    'app' => [
        'contracts' => [
        ],
    ],
    'libs' => [
        'model' => 'Models',
        'contract' => 'Contracts',
        'schema' => 'Schemas',
        'data' => 'Data',
        'resource' => 'Resources',
        'request' => 'Requests',
        'migration' => '../assets/database/migrations'
    ],
    'database' => [
        'models' => [
        ]
    ],
    'patient_summary_libs' => [
        //ADD YOUR LIBS HERE AS STRING
        //ex: HIV_AIDS in HUMAN DISEASE, ENGINE TROUBLE in ENGINE DISEASE, etc
    ],
    'warehouse' => null
];
