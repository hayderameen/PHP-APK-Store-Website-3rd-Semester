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

	function select_posts() {

		global $id;

		$sql = "SELECT blog_post.ID, blog_post.Title , blog_post.Body, 
		              blog_tags.Name, 
		              featured_image.Link, featured_image.alt
		       FROM   blog_post INNER JOIN blog_tags ON blog_post.ID = blog_tags.ID INNER JOIN featured_image ON 
		              featured_image.ID = blog_tags.ID
		              WHERE blog_post.ID=$id";
		
		global $connection;
		return $connection->query($sql);
	}
	
?>

<html>
<head>
	<title>Blog Post Editor - APKHOUSE Dashboard</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="container">
		<div class="jumbotron">
			<center><h1>Dashboard - APKHOUSE</h1></center>
			<center><h2>Blog Post Editor</h2></center>
		</div> <!-- jumbotron heading ends -->

		<div class="jumbotron">

		<?php
			$data = select_posts();
			$row = $data->fetch_assoc();
								
			$id = $row['ID'];
			$title = $row['Title'];
			$tag = $row['Name'];
			$content = $row['Body'];
			$img = $row['Link'];
			$alt = $row['alt'];

			echo '<form role="form" method="post" action="blog_edit_complete.php">
	  			<div class="form-group">
	    			<label for="title">Title:</label>
	    				<input type="text" class="form-control" name="title" value="',$title,'">
	  			</div>
	  			<div class="form-group">
	    			<label for="body">Content:</label>
	    				<input type="text" class="form-control" name="body" value="',$content,'">
	  			</div>
	  			<div class="form-group">
	    			<label for="tag">Tag:</label>
	    				<input type="text" class="form-control" name="tag" value="',$tag,'">
	  			</div>
	  			<div class="form-group">
	    			<label for="image">Image Link:</label>
	    				<input type="text" class="form-control" name="image" value="',$img,'">
	  			</div>
	  			<div class="form-group">
	    			<label for="image_alt">Image Alt Tag:</label>
	    				<input type="text" class="form-control" name="image_alt" value="',$alt,'">
	  			</div>
	  			<div class="form-group">
	    			<label for="id">ID - Do not Change!</label>
	    				<input type="text" class="form-control" name="id" value="',$id,'">
	  			</div>
	  			<div class="form-group">
	    			<label for="publish">Click to Update:</label>
	    				<input type="submit" value="Update">
	  			</div>
			</form>'; 
		?>
			
		</div> <!-- apk edit form jumbotron end -->
	</div> <!-- container end -->
</body>
</html>