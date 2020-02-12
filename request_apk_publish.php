<?php

	$connection = new mysqli("localhost" , "root" , "root" , "apkhouse");

	if ($connection->connect_error) {
		die( "Connection Unsuccessful: " . $connection->connect_error );
	}

	$title = $_POST['app_name'];
	$user = $_POST['name'];

	$sql = "INSERT INTO apk_request(apk_name, applicant)
	VALUES('$title' , '$user')";

	$status = "";

	if ($connection->query($sql) === TRUE) {
		$status = "Request Submitted";
	}
	else {
		$status = "Failed to Submit! Try again.";
	}
?>

<html>
<head>
	<title>Requested APK Submission Status</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<style type="text/css">
		#centered {
			position: absolute;
		    top: 30%;
		    left: 0px;
		    width: 100%;
		    height: 1px;
		    overflow: visible;
		    visibility: visible;
		    display: block;
		}
	</style>
</head>
<body>
<div id="centered">
	<div id="container">
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4">
				<center><h2 class="bg-primary img-rounded" style="padding: 10px;">Your Request:</h2></center>
			</div>
			<div class="col-md-4"></div>
		</div>
		
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4">
				<h3>Your Name: <small><?php echo $user; ?></small> </h3>
				<h3>App Name: <small><?php echo $title; ?></small> </h3>
			</div>
			<div class="col-md-4"></div>
		</div>

		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4">
				<center><h3><?php echo $status; ?></h3></center>
			</div>
			<div class="col-md-4"></div>
		</div>

		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4">
			<br>
				<center><h4 style="font-size: 15px; padding: 10px;" class="bg-info img-rounded">Redirecting to Home.....</h4></center>
				<div class="progress">
				    <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:100%">
				      100%
				    </div>
				</div>
				<script>window.location = 'index.php' </script>
			</div>
			<div class="col-md-4"></div>
		</div>
	</div>
</div>
</body>
</html>