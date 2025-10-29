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
    'warehouse' => null,
    'transaction_item' => 'TransactionItem',
    'survey_flag_key' => 'flag',
    'survey' => [
        'dynamic_form' => [
            'component' => [
                'InputText'     => [
                    'attributes' => [                        
                        'id' => null,
                        'name' => null,
                        'readonly' => false,
                        'required' => false,
                        'max-length' => 0,
                        'placeholder' => null
                    ]
                ], 
                'InputNumber'   => [
                    'attributes' => [
                        'id' => null,
                        'name' => null,
                        'readonly' => false,
                        'required' => false,
                        'placeholder' => null,
                        'max-length' => 0,
                        'min-length' => 0,
                        'mode' => ['number','currency'],
                        'currency' => ['IDR'],
                        'locale'   => ['id-ID'],
                        'min-fraction-digit' => 0,
                        'directive' => ['v-keyfilter.num','v-keyfilter.alpha']
                    ]
                ], 
                'InputOtp'      => [
                    'attributes' => [
                        'id' => null,
                        'name' => null,
                        'readonly' => false,
                        'required' => false,
                        'placeholder' => null
                    ]
                ], 
                'TextEditor'    => [
                    'attributes' => [
                        'id' => null,
                        'name' => null,
                        'readonly' => false,
                        'required' => false,
                        'placeholder' => null
                    ]
                ], 
                'Textarea'      => [
                    'attributes' => [
                        'id' => null,
                        'name' => null,
                        'max-length' => 0,
                        'rows' => 30,
                        'placeholder' => null
                    ]
                ], 
                'Checkbox'      => [
                    'attributes' => [
                        'id' => null,
                        'name' => null,
                        'readonly' => false,
                        'required' => false,
                        'placeholder' => null,
                        'binary' => false
                    ]
                ], 
                'RadioButton'   => [
                    'attributes' => [
                        'id' => null,
                        'name' => null,
                        'readonly' => false,
                        'required' => false
                    ]
                ], 
                'Select'        => [
                    'attributes' => [
                        'id' => null,
                        'name' => null,
                        'readonly' => false,
                        'required' => false,
                        'filter' => ['filter','cleareable','group','option-value','option-label','options']
                    ]
                ], 
                'SelectButton'  => [
                    'attributes' => [
                        'id' => null,
                        'name' => null,
                        'readonly' => false,
                        'required' => false,
                        'filter' => ['filter','cleareable','group','option-value','option-label','options']
                    ]
                ], 
                'MultiSelect'   => [
                    'attributes' => [
                        'id' => null,
                        'name' => null,
                        'readonly' => false,
                        'required' => false,
                        'filter' => ['filter','cleareable','group','option-value','option-label','options']
                    ]
                ], 
                'Slider'        => [
                    'attributes' => [
                        'id' => null,
                        'name' => null,
                        'readonly' => false,
                        'required' => false
                    ]
                ], 
                'ToggleButton'  => [
                    'attributes' => [
                        'id' => null,
                        'name' => null,
                        'readonly' => false,
                        'required' => false
                    ]
                ], 
                'ToggleSwitch'  => [
                    'attributes' => [
                        'id' => null,
                        'name' => null,
                        'readonly' => false,
                        'required' => false
                    ]
                ], 
                'DatePicker'    => [
                    'attributes' => [
                        'id' => null,
                        'name' => null,
                        'readonly' => false,
                        'required' => false,
                    ]
                ], 
                'DatePicker'    => [
                    'attributes' => [
                        'id' => null,
                        'name' => null,
                        'readonly' => false,
                        'required' => false,
                    ]
                ], 
                'DateTimePicker'    => [
                    'attributes' => [
                        'id' => null,
                        'name' => null,
                        'readonly' => false,
                        'required' => false
                    ]
                ],
                'TimePicker'    => [
                    'attributes' => [
                        'id' => null,
                        'name' => null,
                        'readonly' => false,
                        'required' => false
                    ]
                ],
                'MonthPicker'    => [
                    'attributes' => [
                        'id' => null,
                        'name' => null,
                        'readonly' => false,
                        'required' => false
                    ]
                ],
                'YearPicker'    => [
                    'attributes' => [
                        'id' => null,
                        'name' => null,
                        'readonly' => false,
                        'required' => false
                    ]
                ],
                'DateRangePicker'    => [
                    'attributes' => [
                        'id' => null,
                        'name' => null,
                        'readonly' => false,
                        'required' => false
                    ]
                ]
            ]
        ]
    ]
];
