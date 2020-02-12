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
?>
<html>
	<head>
		<title>Make a Blog Post - APK HOUSE</title>
		<meta charset="utf-8">
  		<meta name="viewport" content="width=device-width, initial-scale=1">
  		<link rel="stylesheet" href="style.css">
  		
	</head>

	<body>

		<div class="jumbotron">
			<form role="form" method="post" action="publish_post.php">
	  			<div class="form-group">
	    			<label for="title">Title:</label>
	    				<input type="text" class="form-control" name="title">
	  			</div>
	  			<div class="form-group">
	    			<label for="body">Content:</label>
	    				<input type="text" class="form-control" name="body">
	  			</div>
	  			<div class="form-group">
	    			<label for="tag">Tag:</label>
	    				<input type="text" class="form-control" name="tag">
	  			</div>
	  			<div class="form-group">
	    			<label for="image">Image Link:</label>
	    				<input type="text" class="form-control" name="image">
	  			</div>
	  			<div class="form-group">
	    			<label for="image_alt">Image Alt Tag:</label>
	    				<input type="text" class="form-control" name="image_alt">
	  			</div>
	  			<div class="form-group">
	    			<label for="publish">Click to Publish:</label>
	    				<input type="submit" value="Publish">
	  			</div>
			</form>
			</div> <!-- end of jumbotron -->
	</body>
</html>