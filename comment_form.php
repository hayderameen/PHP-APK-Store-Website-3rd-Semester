<?php
	$connection = new mysqli("localhost" , "root" , "root" , "apkhouse");

	if ($connection->connec_error) {
		die ("Connection Unsuccessful " . $connection->connect_error);
	}

	$sql = "SELECT blog_post.Title, blog_post.ID
		    FROM blog_post 
		    INNER JOIN blog_tags ON blog_post.ID = blog_tags.ID 
		    INNER JOIN featured_image ON featured_image.ID = blog_tags.ID 
		    ORDER BY blog_post.ID desc";

    $data = $connection->query($sql);
?>

<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
	<body>
		<!-- <div class="container"> -->
	  		<h2>
	  			Leave a comment
	  		</h2>
	  			<div class="dropup">
				    <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Write ID of Blog Post to Comment on:
				    	<span class="caret"></span></button>
				    <ul style="padding-left: 5px; padding-right: 5px;" class="dropdown-menu">
				      	<li><center><h4>List of Blog Posts</h4></center></li>
				      	<li class="divider"></li>
				      	<?php
				      		if ($data->num_rows > 0) {
				      			while ($row = $data->fetch_assoc()) {
				      				$title = $row['Title'];
				      				$num = $row['ID'];

				      				echo '<li><span style="font-weight: bold; color: red;">',$num,':</span> ',$title,'</li>';
				      			}
	 			      		} 
				      	?>
				     
	    			</ul>
	  			</div> <!-- end of dropup div -->

	  			<br>

	  			<!-- Starting formal comment form -->
	  			<form role="form" method="post" action="comment_form_publish.php">
		  			<div class="form-group">
		    			<label for="id">Blog Post ID:</label>
		    				<input type="number" class="form-control" name="post-id" placeholder="For Example: 14">
		  			</div>
		  			<div class="form-group">
		    			<label for="user">Your Name:</label>
		    				<input type="text" class="form-control" name="user-name" placeholder="Your Full Name">
		  			</div>
		  			<div class="form-group">
		    			<label for="comment">Comment:</label>
		    				<input type="text" class="form-control" name="comment-body" placeholder="Your comment about the post">
		  			</div>
		  			<div class="form-group">
		    			<label for="publish">Click to Publish Your Comment:</label>
		    				<input type="submit" value="Publish">
		  			</div>
				</form>
		<!-- </div> -->
	</body>
</html>