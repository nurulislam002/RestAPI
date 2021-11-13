<?php
	header('content-type: application/json');

	$server = "localhost";
	$username = "root";
	$password = "";
	$db_name = "my_api";

	$conn = new mysqli($server, $username, $password, $db_name);
	// if($conn->connect_error){
	// 	die("Connection Faild!" .$conn->connect_error);
	// }
	
	
	// echo "Database connet succsessfull !";
?>