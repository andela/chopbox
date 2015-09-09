<?
// This is global bootstrap for autoloading
\Codeception\Configuration::$defaultSuiteSettings['modules']['config'] = [
<<<<<<< HEAD
    'Db' => [
        'dsn' => 'mysql:host=' . getenv('DB_URL') . ';dbname=' . getenv('DB_NAME'),
        'user' => getenv('DB_USER'),
        'password' => '',
        'dump' => 'tests/_data/dump.sql',
        'populate' => true,
        'cleanup' => true
    ]
];
=======
		'Db' => [
				'dsn' => 'mysql:host=' . getenv('DB_URL') . ';dbname=' . getenv('DB_NAME'),
				'user' => getenv('DB_USER'),
				'password' => '',
				'dump' => 'tests/_data/dump.sql',
				'populate' => true,
				'cleanup' => true
		]
];
>>>>>>> 0450c060dbefd3f2b70ff2cfe63ef3f753a8d210
