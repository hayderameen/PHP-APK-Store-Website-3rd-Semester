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

	function select_apks() {
		
		global $id;

		$sql = "SELECT * FROM app INNER JOIN apk ON app.app_id=apk.app_id INNER JOIN app_image on app_image.app_id=apk.app_id INNER JOIN category on category.cat_id=app.cat_id
				WHERE app.app_id=$id";

		global $connection;
		return $connection->query($sql);
	}
	
?>

<html>
<head>
	<title>APK Editor - APKHOUSE Dashboard</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="container">
		<div class="jumbotron">
			<center><h1>Dashboard - APKHOUSE</h1></center>
			<center><h2>APK Editor</h2></center>
		</div> <!-- jumbotron heading ends -->

		<div class="jumbotron">

		<?php
			$data = select_apks();
			$row = $data->fetch_assoc();
								
			$id = $row['app_id'];
			$apk_name = $row['app_name'];
			$desc = $row['description'];
			$version = $row['version'];
			$d_link = $row['link'];
			$size = $row['size'];
			$img = $row['link_img'];
			$alt = $row['alt'];
			$cat = $row['cat_id'];
			$dev = $row['developer'];

			echo '<form role="form" method="post" action="apk_edit_complete.php">
	  			<div class="form-group">
	    			<label for="App Name">App Name:</label>
	    				<input type="text" class="form-control" name="app_name" value="',$apk_name,'">
	  			</div>
	  			<div class="form-group">
	    			<label for="Category">Category:</label>
	    			<label for="Category">Write Category ID: </label> <br>
	    			<label for="Category">Communication: 1 | Fitness: 2 | Music: 3 | Games: 4 | Photography: 5</label>
	    				<input type="number" class="form-control" name="category" value="',$cat,'">
	  			</div>
	  			<div class="form-group">
	    			<label for="About">About the App:</label>
	    				<input type="text" class="form-control" name="desc" value="',$desc,'">
	  			</div>
	  			<div class="form-group">
	    			<label for="Developer">Developer:</label>
	    				<input type="text" class="form-control" name="developer" value="',$dev,'">
	  			</div>
	  			<div class="form-group">
	    			<label for="Image Link">Image Link:</label>
	    				<input type="text" class="form-control" name="image_link" value="',$img,'">
	  			</div>
	  			<div class="form-group">
	    			<label for="image_alt">Image alt tag:</label>
	    				<input type="text" class="form-control" name="image_alt_tag" value="',$alt,'">
	  			</div>
	  			<div class="form-group">
	    			<label for="Version">Version:</label>
	    				<input type="text" class="form-control" name="version" value="',$version,'">
	  			</div>
	  			<div class="form-group">
	    			<label for="Download Link">Download Link:</label>
	    				<input type="text" class="form-control" name="download_link" value="',$d_link,'">
	  			</div>
	  			<div class="form-group">
	    			<label for="Size">APK Size:</label>
	    				<input type="text" class="form-control" name="size" value="',$size,'">
	  			</div>
	  			<div class="form-group">
	    			<label for="id">APK ID - Do not change!</label>
	    				<input type="number" class="form-control" name="id" value="',$id,'">
	  			</div>
	  			<div class="form-group">
	    			<label for="publish">Click to Update:</label>
	    				<input type="submit" value="Update">
	  			</div>'; 
		?>
			
		</div> <!-- apk edit form jumbotron end -->
	</div> <!-- container end -->
</body>
</html>