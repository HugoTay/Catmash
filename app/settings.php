<?php

define('DEBUG', true);

return [
    'settings' => [
        // Core settings
        'debug' => DEBUG,
        'displayErrorDetails' => DEBUG,
        // View settings
        'views' => [
            'view_path' => dirname(__DIR__) . '/app/Views',
        ],

        // Database settings
        'db' => [
            'driver'    => 'mysql',
            'host'      => 'localhost',
            'database'  => 'facemash',
            'username'  => 'root',
            'password'  => 'hugoserver',
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ]
    ]
];
