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
		<!-- <title>Publish APK - APK HOUSE</title> -->
		<meta charset="utf-8">
  		<meta name="viewport" content="width=device-width, initial-scale=1">
  		<link rel="stylesheet" href="style.css">
  		
  		
	</head>

	<body>
	<div class="jumbotron">
			<form role="form" method="post" action="publish_apk.php">
	  			<div class="form-group">
	    			<label for="App Name">App Name:</label>
	    				<input type="text" class="form-control" name="app_name">
	  			</div>
	  			<div class="form-group">
	    			<label for="Category">Category:</label>
	    			<label for="Category">Write Category ID: </label> <br>
	    			<label for="Category">Communication: 1 | Fitness: 2 | Music: 3 | Games: 4 | Photography: 5</label>
	    				<input type="number" class="form-control" name="category">
	  			</div>
	  			<div class="form-group">
	    			<label for="About">About the App:</label>
	    				<input type="text" class="form-control" name="desc">
	  			</div>
	  			<div class="form-group">
	    			<label for="Developer">Developer:</label>
	    				<input type="text" class="form-control" name="developer">
	  			</div>
	  			<div class="form-group">
	    			<label for="Image Link">Image Link:</label>
	    				<input type="text" class="form-control" name="image_link">
	  			</div>
	  			<div class="form-group">
	    			<label for="image_alt">Image alt tag:</label>
	    				<input type="text" class="form-control" name="image_alt_tag">
	  			</div>
	  			<div class="form-group">
	    			<label for="Version">Version:</label>
	    				<input type="text" class="form-control" name="version">
	  			</div>
	  			<div class="form-group">
	    			<label for="Download Link">Download Link:</label>
	    				<input type="text" class="form-control" name="download_link">
	  			</div>
	  			<div class="form-group">
	    			<label for="Size">APK Size:</label>
	    				<input type="text" class="form-control" name="size">
	  			</div>
	  			<div class="form-group">
	    			<label for="publish">Click to Publish:</label>
	    				<input type="submit" value="Publish">
	  			</div>
			</form>
			</div> <!-- end of jumbotron -->
	</body>
</html>