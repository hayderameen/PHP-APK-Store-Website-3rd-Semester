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

	$id = 0; // This will hold reference to ID of the app (It is auto generated)

	// Now getting all values from the form stored into variables

	$title = $_POST['app_name'];
	$category = $_POST['category'];
	$description = $_POST['desc'];
	$developer = $_POST['developer'];
	$image_link = $_POST['image_link'];
	$alt_tag = $_POST['image_alt_tag'];
	$version = $_POST['version'];
	$download_link = $_POST['download_link'];
	$size = $_POST['size'];

	// Queries to insert data into three tables

	$sql_app = "INSERT INTO app(app_name, cat_id, developer, description)
	VALUES('$title', $category, '$developer', '$description')";

	if ($connection->query($sql_app) === TRUE) {
		echo "Data Successfully entered into app Table";
	}
	else {
		echo "Error in inserting data into app table with this query: " . $sql_app . " Errors: " . $connection->error;
	}

	// Getting auto-generated ID of this APK

	$id = $connection->insert_id;

	$sql_apk = "INSERT INTO apk(app_id, version, link, size)
	VALUES($id, '$version' , '$download_link' , '$size')";

	if ($connection->query($sql_apk) === TRUE) {
		echo "Data inserted into apk Table<br>";
	}
	else {
		echo "Error inserting data into apk Table with this query: " . $sql_apk . " Errors: " . $connection->error;
	}


	$sql_img = "INSERT INTO app_image(app_id, link_img, alt)
	VALUES($id, '$image_link', '$alt_tag')";

	if ($connection->query($sql_img) === TRUE) {
		echo "Data successfully entered into image Table";
	}
	else {
		echo "Error entering data into img Table with query: " . $sql_img . " Errors: " . $connection->error;
	}

	$connection->close();
 
?>

<!DOCTYPE html>
<html>
<head>
	<title>APK Publishing - For Admin only</title>
</head>
<body>
	<hr>
	<hr>
	<br>
	<h3 class="bg-danger"><a href="admin.php">Redirecting to Dashboard.....</a></h3>
	<script>window.location = 'admin.php'</script>
</body>
</html>