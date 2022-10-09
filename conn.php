<?php
	$conn = new mysqli("localhost", "MYSQLUSERNAME", "MYSQLPASSWORD", "MYSQLDATABASENAME");
	
	if(!$conn){
		die("Error: Cannot connect to the database");
	}
?>