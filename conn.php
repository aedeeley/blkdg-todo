<?php
	$conn = new mysqli("localhost", "ph_user_0UccRWTx", "QPkrzrApVGY7Ej8A6usPI", "ph_db_MMGzdIzm"); // update with mysql connection info to connect database
	
	if(!$conn){
		die("Error: Cannot connect to the database"); // if connection failed show error
	}
?>