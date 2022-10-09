<?php
	require_once 'conn.php';
	
	if($_GET['task_id'] != ""){
		
	if($_GET['status'] == "Done"){
		$task_id = $_GET['task_id'];
		$conn->query("UPDATE `task` SET `status` = 'Incomplete' WHERE `task_id` = $task_id") or die(mysqli_errno($conn));
		header('location: index.php');
	}

	if($_GET['status'] == "Incomplete") {
		$task_id = $_GET['task_id'];
		$conn->query("UPDATE `task` SET `status` = 'Done' WHERE `task_id` = $task_id") or die(mysqli_errno($conn));
		header('location: index.php');
	}

	}
?>