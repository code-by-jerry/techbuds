<?php

return [
    'invoice_overdue' => [
        'enabled' => true,
        'grace_days' => 0,
    ],

    'task_overdue' => [
        'enabled' => true,
        'grace_days' => 0,
    ],

    'project' => [
        'auto_complete' => true,
        'status_order' => [
            'planning',
            'ui_ux',
            'development',
            'testing',
            'deployment',
            'handover',
            'maintenance',
            'completed',
            'cancelled',
        ],
        'status_thresholds' => [
            'development' => 10, // percentage progress
            'testing' => 60,
            'deployment' => 85,
        ],
    ],

    'client_status_map' => [
        'completed' => ['completed', 'maintenance'],
        'offboarding' => ['handover'],
        'in_testing' => ['testing', 'deployment'],
        'in_development' => ['development', 'ui_ux'],
        'project_started' => ['planning'],
    ],
];

