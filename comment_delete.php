<?php

	// Checking if user is logged on or not
	session_start();

	// Checking if user is logged on or not
	if (!isset($_SESSION['user']) || empty($_SESSION['user'])) {
		if (!isset($_SESSION['pass']) || empty($_SESSION['pass'])) {
			
			echo 'You must login first. Redirecting....';
			echo '<script>window.location = "login.php"</script>';
		}
	}
	
	$connection = new mysqli("localhost", "root", "root", "apkhouse");

	if ($connection->connect_error) {
		die("Connection Unsuccessful because: " . $connection->connect_error);
	}

	$id = $_POST['id'];

	$sql = "DELETE FROM comment_body WHERE comment_id=$id";
	$sql2 = "DELETE FROM comment_author WHERE comment_id=$id";

	if ($connection->query($sql) === TRUE) {
		echo "First step of deletion successful! <br>";
	} 
	else {
		echo "Failed first step";
	}

	if ($connection->query($sql2) === TRUE) {
		echo "Second step of deletion successful! <br>";
	}
	else {
		echo "Failed at second step of deletion<br>";
	}

	echo 'Redirecting....';
	echo '<script>window.location="moderate_comments.php"</script>';

	$connection->close();

?>