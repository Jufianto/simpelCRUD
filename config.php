<?php 
$DB_host = "localhost";		 // Your Host 
$DB_user = "root"; 			//your User Db
$DB_pass = "";				// Your Password Db
$DB_name = "corporation";	// Your Database Name

try {
	$conn = new PDO("mysql:host=$DB_host;dbname=$DB_name",$DB_user,$DB_pass);	//Open Connection
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);				// Set error mode 								
}catch(PDOException $e)
{
	echo "Connection Lost"; //if connection lost run this code
	exit();
}
?>
