require 'Medoo.php';

use Medoo/Medoo;

$database = new Medoo([
	'type' => 'mariadb',
	'host' => 'localhost',
	'database' => getenv('DB_NAME'),
	'username' => getenv('DB_USER'),
	'password' => getenv('DB_PASSWORD'),

	'charset' => 'utf8mb4',
	'collation'=> 'utf8mb4_general_ci',
	'port' => 3306
	]
]);


