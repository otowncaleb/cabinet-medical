<?php

session_start();

$host = "host=localhost";
$port = "port=5432";
$dbname = "dbname=lab6";
$credentials = "user=postgres password=5kri113x";

$_SESSION["host"] = $host;
$_SESSION["port"] = $port;
$_SESSION["db"] = $dbname;
$_SESSION["credentials"] = $credentials;



function connectDB($host, $port, $dbname, $credentials) {
	
	$db = pg_connect ( "$host $port $dbname $credentials" );
	if (! $db) {
		echo "Error : Unable to open database\n";
	} else {
		echo "Opened database successfully\n";
	}
}

connectDB ($host, $port, $dbname, $credentials);

?>