<?php
	$conn = new mysqli("localhost", "MYSQLUSERNAME", "MYSQLPASSWORD", "MYSQLDATABASENAME"); // update with mysql connection info to connect database
	
	if(!$conn){
		die("Error: Cannot connect to the database"); // if connection failed show error
	}
?>