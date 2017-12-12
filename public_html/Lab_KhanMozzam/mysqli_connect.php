<?php # Script 8.2 - mysqli_connect.php

DEFINE ('DB_USER', 'fsef15g4');
DEFINE ('DB_PASSWORD', 'fsef15g4');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'fsef15g4');

$dbc = @mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR die ('Could not connect to MySQL: ' . mysqli_connect_error() );

?>