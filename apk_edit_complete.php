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
	
	$connection = new mysqli("localhost" , "root", "root" , "apkhouse");

	if ($connection->connect_error) {
		echo "Connection Unsuccessful" . $connection->connect_error . "<br>";
	}
	else {
		echo "Database connection Successfully Established<br>";
	}

	$id = $_POST['id']; // This will hold reference to ID of the app

	// Now getting all values from the form stored into variables

	$title = $_POST['app_name'];
	$category = $_POST['category'];
	$desc = $_POST['desc'];
	$dev = $_POST['developer'];
	$image_link = $_POST['image_link'];
	$alt_tag = $_POST['image_alt_tag'];
	$version = $_POST['version'];
	$download_link = $_POST['download_link'];
	$size_apk = $_POST['size'];

	// Queries to update data into three tables

	$sql_app = "UPDATE app SET app_name='$title', cat_id=$category, developer='$dev', description='$desc' WHERE app_id=$id";

	if ($connection->query($sql_app) === TRUE) {
		echo "Data Successfully entered into app Table";
	}
	else {
		echo "Error in inserting data into app table with this query: " . $sql_app . " Errors: " . $connection->error;
	}

	$sql_apk = "UPDATE apk SET version='$version', link='$download_link', size='$size_apk' WHERE app_id=$id";

	if ($connection->query($sql_apk) === TRUE) {
		echo "Data inserted into apk Table<br>";
	}
	else {
		echo "Error inserting data into apk Table with this query: " . $sql_apk . " Errors: " . $connection->error;
	}


	$sql_img = "UPDATE app_image SET link_img='$image_link', alt='$alt_tag' WHERE app_id=$id";

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