<?php 
include ('dumper.php');
try {
	$world_dumper = Shuttle_Dumper::create(array(
		'host' => 'localhost',
		'username' => 'root',
		'password' => '',
		'db_name' => 'test',
	));
	// dump the database to plain text file
	$world_dumper->dump('test.sql');
	$wp_dumper = Shuttle_Dumper::create(array(
		'host' => 'localhost',
		'username' => 'root',
		'password' => '',
		'db_name' => 'test',
	));

} catch(Shuttle_Exception $e) {
	echo "Couldn't dump database: " . $e->getMessage();
}