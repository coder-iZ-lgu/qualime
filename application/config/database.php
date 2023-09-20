<?php defined('SYSPATH') OR die('No direct access allowed.');

return array
(
	'default' => array
	(
		'type'       => 'MySQLi',
		'connection' => array(
		'hostname'   => 'localhost',
			'database'   => 'qual',
			'username'   => 'root',
			'password'   => '', # QM123!123
			'persistent' => FALSE,
		),
		'table_prefix' => '',
		'charset'      => 'utf8',
		'caching'      => FALSE,
	),
	'alternative' => array(
	'type'       => 'PDO',
	'connection' => array(

		'dsn'        => 'mysql:host=localhost;dbname=qm_tst',
		'username'   => 'qm',
		'password'   => 'IXUXXqEllN',
		'persistent' => FALSE,
	),

	'table_prefix' => '',
	'charset'      => 'utf8',
	'caching'      => FALSE,
),
);