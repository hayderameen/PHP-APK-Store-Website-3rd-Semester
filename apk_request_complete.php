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
	
	$connection = new mysqli("localhost" , "root" , "root" , "apkhouse");

	if ($conenction->connect_error) {
		die ("Connection Unsuccessful. What went wrong? here it is: " . $connection->connect_error);
	}

	$id = $_POST['id'];

	$sql = "UPDATE apk_request
			SET done=1
			WHERE request_id=$id";

	if ($connection->query($sql) === TRUE) {
		echo 'Successfully Updated';
		echo '<br>Redirecting....';
		echo '<script>window.location = "all_request_apks.php"</script>';
	}
	else {
		echo 'Failed attempt. Try again.';
		echo '<br>Redirecting....';
		echo '<script>window.location = "all_request_apks.php"</script>';
	}

	$connection->close();
?>
