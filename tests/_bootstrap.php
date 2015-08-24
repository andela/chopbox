<?php
// This is global bootstrap for autoloading
\Codeception\Configuration::$defaultSuiteSettings['modules']['config'] = [
    'Db' => [
        'dsn' => 'mysql:host=' . getenv('DB_URL') . ';dbname=' . getenv('DB_NAME'),
        'user' => getenv('DB_USER'),
        'password' => '',
        'dump' => 'tests/_data/dump.sql',
        'populate' => true,
        'cleanup' => true
    ]
];
