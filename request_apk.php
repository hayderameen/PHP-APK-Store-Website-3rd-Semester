<?php
	// Add table for rquested apk (requestor_name, apk_name)
	// Make form for inserting data into it
	// Load new page where a request submitted logo is shown once a request is submitted
	// Provode link to move back to homepage
	// include this into all apk category pages
?>

<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<style type="text/css">
		.heading {
			color: #fff;
			background-color: #00cc00;
			border-color: #000000;
			padding: 5px;
		}
	</style>
</head>
<body>
	<center><h4 class="heading img-rounded">Did not find what you were looking for? Request an APK</h4></center>
	<form role="form" method="post" action="request_apk_publish.php">
	  			<div class="form-group">
	    			<label for="Applicant">Your Name:</label>
	    				<input type="text" class="form-control" name="name">
	  			</div>
	  			<div class="form-group">
	    			<label for="app">Name of App:</label>
	    				<input type="text" class="form-control" name="app_name">
	  			</div>
	  			<div class="form-group">
	    			<label for="publish">Click to Submit Request:</label>
	    				<input type="submit" value="Submit">
	  			</div>
			</form>
</body>
</html>