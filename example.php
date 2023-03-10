<?php
include __DIR__.DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'autoload.php';
$exceptions = new \EvolutionPHP\Exceptions\Exceptions();
$exceptions->register(true);
$exceptions->add_logger([
	'file_path' => __DIR__.'/logs/'
]);
$data = array(
	'hostname' => 'localhost', //Database Hostname
	'username' => 'root', //Database Username
	'password' => 'root', //Database Password
	'database' => 'mydb', //Database Name
	'table_prefix' => '', //Table prefix
	'char_set' => 'utf8mb4', //Database chart set
	'dbcollat' => 'utf8mb4_bin', //Database collation
	'port' => '', //Enter if you know the port number, otherwise leave empty
);


//$db->testConnection($data);

$db = \EvolutionPHP\Database\Database::connect($data);

$q = $db->where('username','userdemos')
	->get('memberss');
if($q->num_rows() > 0){
	print_r($q->row());
}

//Forge
$forge = new \EvolutionPHP\Database\Library\Forge($db);
$forge->drop_table('example', true);