
<?php
require_once 'configBD.php';

$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if ($mysqli -> connect_errno)
{
	echo "Connect failed: " . $mysqli->connect_error;
	exit();
}



?>