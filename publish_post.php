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
		die ("Connection Failed: " . $connection->connec_error);
	}

	echo "Database Connection Successful<br>";

	$id = 0;

	// Now inserting blog post into database

	$title = $_POST['title'];
	$body = $_POST['body'];

	//First query to insert into blog_post table
	$sql1 = "INSERT INTO blog_post(Title, Body)
	VALUES('$title' , '$body')";

	if ($connection->query($sql1) === TRUE) {
		echo "Body, Title and ID Inserted in blog_post table<br>";
	} else {
		echo "Error in: " . $sql1 . " " . $connection->error;
	}

	$id = $connection->insert_id;

	$tag = $_POST['tag'];

	$sql2 = "INSERT INTO blog_tags(ID, Name)
	VALUES($id, '$tag')";

	if ($connection->query($sql2) === TRUE) {
		echo "Tag and ID inserted into blog_tags table<br>";
	} else {
		echo "Error in: " . $sql2 . " " . $connection->error;
	}

	$image = $_POST['image'];
	$alt = $_POST['image_alt'];

	$sql3 = "INSERT INTO featured_image(ID, Link, alt)
	VALUES($id , '$image' , '$alt')";

	if ($connection->query($sql3) === TRUE) {
		echo "Image link, Alt tag and ID inserted into featured_image table<br>";
	} else {
		echo "Error in: " . $sql3 . " " . $connection->error;
	}

	$connection->close();
?>
<html>
<head>
	<title>Post Publishing Status: For Admin only</title>
</head>
<body>
<hr>
<hr>
<br>
<h3><a class="bg-danger" href="admin.php">Redirecting to Dashboard....</a></h3>
<script>window.location = 'admin.php'</script>
</body>
</html>