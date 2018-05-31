<?php 
include ('demo2.php');
try {
	$world_dumper = Shuttle_Dumper::create(array(
		'host' => 'localhost',
		'username' => 'azzurrac_azuserc',
		'password' => '+S-H_q=b#+7P',
		'db_name' => 'azzurrac_azzurraceramica_online',
	));
	// dump the database to plain text file
	$world_dumper->dump('demo_s.sql');
	$wp_dumper = Shuttle_Dumper::create(array(
		'host' => 'localhost',
		'username' => 'azzurrac_azuserc',
		'password' => '+S-H_q=b#+7P',
		'db_name' => 'azzurrac_azzurraceramica_online',
	));

} catch(Shuttle_Exception $e) {
	echo "Couldn't dump database: " . $e->getMessage();
}