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

	$sql_post = "DELETE FROM blog_post WHERE ID=$id";
	$sql_tag = "DELETE FROM blog_tags WHERE ID=$id";
	$sql_img = "DELETE FROM featured_image WHERE ID=$id";

	if ($connection->query($sql_post) === TRUE) {
		echo "Data Successfully deleted from blog_post Table";
	}
	else {
		echo "Error in deleting data from blog_post table with this query: " . $sql_app . " Errors: " . $connection->error;
	}

	if ($connection->query($sql_tag) === TRUE) {
		echo "Data Successfully deleted from blog_tags Table";
	}
	else {
		echo "Error in deleting data from blog_tags table with this query: " . $sql_app . " Errors: " . $connection->error;
	}

	if ($connection->query($sql_img) === TRUE) {
		echo "Data Successfully deleted from featured_image Table";
	}
	else {
		echo "Error in deleting data from featured_image table with this query: " . $sql_app . " Errors: " . $connection->error;
	}

		echo '<br>Redirecting...';
		echo '<script>window.location = "all_blog_posts.php"</script>';
	

	$connection->close();
?>