<?php 
	session_start();
?>

<html>
<head>
	<title>Login to APKHOUSE Admin Area</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<style type="text/css">
		#centered {
			position: absolute;
		    top: 30%;
		    width: 100%;
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

			<?php
				// Checking if user is logged on or not
				if (!isset($_SESSION['user']) || empty($_SESSION['user'])) {
					if (!isset($_SESSION['pass']) || empty($_SESSION['pass'])) {
						
						echo '<center><h4 style="color: red;">You are not logged in. Login to continue.</h4></center>';
						
					}
				}
			?>
				<center><h2 class="bg-primary img-rounded" style="padding: 10px;">APKHOUSE - Login</h2></center>
			</div>
			<div class="col-md-4"></div>
		</div>
		
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4">
				<form role="form" method="post" action="login_check.php">
		  			<div class="form-group">
		    			<label for="username">username:</label>
		    				<input type="varchar" class="form-control" name="username" placeholder="Username">
		  			</div>
		  			<div class="form-group">
		    			<label for="password">Password:</label>
		    				<input type="password" class="form-control" name="password" placeholder="*********">
		  			</div>
		  			<div class="form-group">
		    			<label for="Log In">Press to Login: </label>
		    				<input type="submit" value="Login">
		  			</div>
				</form>
				<center><h2><a class="bg-info img-rounded" style="padding: 10px;" href="index.php">Back to Home</a></h2></center>
			</div>
			<div class="col-md-4"></div>
		</div>

	</div>
</body>
</html>