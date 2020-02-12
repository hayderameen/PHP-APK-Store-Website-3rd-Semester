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

	function select_comments() {

		global $id;
		
		$sql = "SELECT comment_content, comment_id 
				FROM comment_body 
				WHERE comment_id=$id";
		
		global $connection;
		return $connection->query($sql);
	}
	
?>

<html>
<head>
	<title>Comments Moderator - APKHOUSE Dashboard</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="container">
		<div class="jumbotron">
			<center><h1>Dashboard - APKHOUSE</h1></center>
			<center><h2>Comments Moderator</h2></center>
		</div> <!-- jumbotron heading ends -->

		<div class="jumbotron">

		<?php
			$data = select_comments();
			$row = $data->fetch_assoc();
								
			$id = $row['comment_id'];
			$comment = $row['comment_content'];

			echo '<form role="form" method="post" action="comment_edit_complete.php">
		  			<div class="form-group">
		    			<label for="comment">Comment:</label>
		    				<input type="text" class="form-control" name="comment-body" value="',$comment,'">
		  			</div>
		  			<div class="form-group">
		    			<label for="id">Comment ID - Do not change it</label>
		    				<input type="number" class="form-control" name="id" value="',$id,'">
		  			</div>
		  			<div class="form-group">
		    			<label for="publish">Click to Update Comment:</label>
		    				<input type="submit" value="Update">
		  			</div>
				</form>'; 
		?>
			
		</div> <!-- apk edit form jumbotron end -->
	</div> <!-- container end -->
</body>
</html>