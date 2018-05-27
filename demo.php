<?php 
include ('dumper.php');
try {
	$world_dumper = Shuttle_Dumper::create(array(
		'host' => 'localhost',
		'username' => 'user_atelier_and',
		'password' => 'bAnHi%z4mvE#',
		'db_name' => 'demo_cadorwine_it_magento',
	));
	// dump the database to plain text file
	$world_dumper->dump('demo_cadorwine_it_magento.sql');
	$wp_dumper = Shuttle_Dumper::create(array(
		'host' => 'localhost',
		'username' => 'user_atelier_and',
		'password' => 'bAnHi%z4mvE#',
		'db_name' => 'demo_cadorwine_it_magento',
	));

} catch(Shuttle_Exception $e) {
	echo "Couldn't dump database: " . $e->getMessage();
}