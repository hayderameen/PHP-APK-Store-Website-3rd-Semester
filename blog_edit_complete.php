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

	$id = $_POST['id']; // Holds reference to post being edited

	// Updated data
	$title = $_POST['title'];
	$body = $_POST['body'];
	$tag = $_POST['tag'];
	$image = $_POST['image'];
	$alt = $_POST['image_alt'];

	$sql_post = "UPDATE blog_post SET Body='$body', Title='$title' WHERE ID=$id";
	$sql_tag = "UPDATE blog_tags SET Name='$tag' WHERE ID=$id";
	$sql_img = "UPDATE featured_image SET Link='$image', alt='$alt' WHERE ID=$id";

	if ($connection->query($sql_post) === TRUE) {
		echo "Data Successfully entered into blog_post Table";
	}
	else {
		echo "Error in inserting data into blog_post table with this query: " . $sql_app . " Errors: " . $connection->error;
	}

	if ($connection->query($sql_tag) === TRUE) {
		echo "Data Successfully entered into blog_tags Table";
	}
	else {
		echo "Error in inserting data into blog_tags table with this query: " . $sql_app . " Errors: " . $connection->error;
	}

	if ($connection->query($sql_img) === TRUE) {
		echo "Data Successfully entered into featured_image Table";
	}
	else {
		echo "Error in inserting data into featured_image table with this query: " . $sql_app . " Errors: " . $connection->error;
	}

		echo '<br>Redirecting...';
		echo '<script>window.location = "all_blog_posts.php"</script>';
	

	$connection->close();
?>