<?php
	$connection = new mysqli("localhost" , "root", "root", "apkhouse");

	if ($connection->connect_error) {
		die("Connection Unsuccessful " . $connection->connect_error);
	}

	$comment = $_POST['comment-body'];
	$user = $_POST['user-name'];
	$blogID = $_POST['post-id'];

	$sql_comment = "INSERT INTO comment_body(comment_content, ID)
	VALUES('$comment' , $blogID)";

	$status = "";

	if ($connection->query($sql_comment) === TRUE) {
		$status = "Comment Published";
	}
	else {
		$status = "Comment not published";
	}

	$id = $connection->insert_id; // ID of the comment just published

	$sql_author = "INSERT INTO comment_author(author_name, comment_id)
	VALUES('$user' , $id)";

	if ($connection->query($sql_author) === TRUE) {
		$status = "Comment Published";
	}
	else {
		$status = "Comment not published";
	}
?>


<html>
<head>
	<title>Comment Publish Status</title>
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
				<center><h2 class="bg-primary img-rounded" style="padding: 10px;">Your Comment:</h2></center>
			</div>
			<div class="col-md-4"></div>
		</div>
		
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4">
				<h3>Your Name: <small><?php echo $user; ?></small> </h3>
				<h3>App Name: <small><?php echo $comment; ?></small> </h3>
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
				<center><h4 style="font-size: 15px; padding: 10px;" class="bg-info img-rounded">Redirecting to Blog.....</h4></center>
				<div class="progress">
				    <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:100%">
				      100%
				    </div>
				</div>
				<script>window.location = 'blog.php' </script>
			</div>
			<div class="col-md-4"></div>
		</div>
	</div>
</div>

</body>
</html>