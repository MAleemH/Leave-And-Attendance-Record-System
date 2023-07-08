<?php
	// creating an array for db connection
	$db['db_host'] = "localhost";
	$db['db_user'] = "root";
	$db['db_pass'] = "";
	$db['db_name'] = "laars";
	// converting the array values into constants
	foreach ($db as $key => $value) {
		define(strtoupper($key), $value);
	}
	$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	if (!$connection) {
		echo "Connection Failed!";
	}
 ?>