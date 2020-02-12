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

	$sql_app = "DELETE FROM app WHERE app_id=$id";
	$sql_apk = "DELETE FROM apk WHERE app_id=$id";
	$sql_img = "DELETE FROM app_image WHERE app_id=$id";

	if ($connection->query($sql_app) === TRUE) {
		echo "Data Successfully deleted from app Table";
	}
	else {
		echo "Error in deleting data into app table with this query: " . $sql_app . " Errors: " . $connection->error;
	}

	if ($connection->query($sql_apk) === TRUE) {
		echo "Data inserted into apk Table<br>";
	}
	else {
		echo "Error inserting data into apk Table with this query: " . $sql_apk . " Errors: " . $connection->error;
	}

	if ($connection->query($sql_img) === TRUE) {
		echo "Data successfully entered into image Table";
	}
	else {
		echo "Error entering data into img Table with query: " . $sql_img . " Errors: " . $connection->error;
	}

	echo 'Redirecting...';
	echo '<script>window.location = "all_uploaded_apks.php"</script>';

	$connection->close();
?>