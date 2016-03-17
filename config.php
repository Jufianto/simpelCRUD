<?php 
$DB_host = "localhost";
$DB_user = "root";
$DB_pass = "";
$DB_name = "jufidocs"

try {
	$conn = new PDO("mysql:host=$DB_host;dbname=$DB_name",DB_user,DB_pass);
	$conn->setAttributes(PDO:)
}catch(PDOException $e)
{
	echo "Connection Lost";
	exit();
}
