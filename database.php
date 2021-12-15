<?php
require 'vendor/autoload.php';
use Medoo\Medoo;

$database = new Medoo([
	'type' => 'mariadb',
	'host' => 'localhost',
	'database' => getenv('DB_NAME'),
	'username' => getenv('DB_USER'),
	'password' => getenv('DB_PASSWORD')
	]);


?>