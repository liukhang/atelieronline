<?php 
include ('dumper.php');
try {
	$world_dumper = Shuttle_Dumper::create(array(
		'host' => 'localhost',
		'username' => 'root',
		'password' => '',
		'db_name' => 'm1_m19_atelier',
	));
	// dump the database to plain text file
	$world_dumper->dump('m1.9-cadorwine.sql');
	$wp_dumper = Shuttle_Dumper::create(array(
		'host' => 'localhost',
		'username' => 'root',
		'password' => '',
		'db_name' => 'm1_m19_atelier',
	));

} catch(Shuttle_Exception $e) {
	echo "Couldn't dump database: " . $e->getMessage();
}