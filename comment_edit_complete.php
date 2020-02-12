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
	$content = $_POST['comment-body'];

	$sql = "UPDATE comment_body
			SET comment_content='$content'
			WHERE comment_id=$id";

	if ($connection->query($sql) === TRUE) {
		echo "Comment Updated.<br>";
	}
	else {
		echo "Comment could not be updated. Try again";
	}

	echo "Redirecting....";
	echo '<script>window.location = "moderate_comments.php"</script>';
?>