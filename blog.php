<?php
// error_reporting(E_All);
	$connection = new mysqli("localhost", "root", "root", "apkhouse");

	if ($connection->connect_error) {
		die( "Connection Unsuccessful: " . $connection->connect_error );
	}

	function select_data_from_blog_posts() {

		global $connection;

		$sql = "SELECT blog_post.ID, blog_post.Title , blog_post.Body, 
		              blog_tags.Name, 
		              featured_image.Link, featured_image.alt
		       FROM   blog_post INNER JOIN blog_tags ON blog_post.ID = blog_tags.ID INNER JOIN featured_image ON 
		              featured_image.ID = blog_tags.ID ORDER BY blog_post.ID desc";

		return $connection->query($sql);
	}

	function load_comments($c_id) {
		
		global $connection;

		$sql_comments="SELECT comment_body.comment_content, comment_author.author_name
					   FROM comment_body INNER JOIN comment_author ON comment_body.comment_id=comment_author.comment_id
					   WHERE comment_body.ID=$c_id";

		return $connection->query($sql_comments);
	}

?>
<html>
	<head>
		<title>Blog - APK HOUSE</title>
		<meta charset="utf-8">
  		<meta name="viewport" content="width=device-width, initial-scale=1">
  		<link rel="stylesheet" href="style.css">
  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  		
  		<style type="text/css">
  			#width_container {
				width: 1200px;
			}	
  		</style>
	</head>
	<body id="top-home">
	<?php include('header_non_home.php') ?>
		<div class="container">
			
			<br>
			<br>	
		<br>
		<br>
		<!-- <center><h1 style="padding-top: 20px; padding-bottom:20px; width=50%;" class="bg-primary img-rounded">Latest News and Reviews</h1></center> -->
		<div class="jumbotron">
			<center><h1><span class="bg-primary img-rounded" style="padding: 10px;">APK</span><span style="color: ff3200;">HOUSE</span> - BLOG</h1></center>
		</div>
		

		<?php
			$data = select_data_from_blog_posts();

			// Loop to get Blog Posts from Database
			if ($data->num_rows>0) {
				while ($row = $data->fetch_assoc()) {
					$title = $row['Title'];
					$content = $row['Body'];
					$tag = $row['Name'];
					$link = $row['Link'];
					$alt = $row['alt'];
					$c_id = $row['ID'];

				    // The post itself in HTML
				    echo '<div class="media">
  							<div class="media-left media-top">
      							<img class="img-circle media-object" src="' , $link , '" alt="' ,$alt, '" width="200" height="200">
  							</div>
  							<div class="media-body">
    							<h1 style="padding:10px;" class="bg-success media-heading img-rounded">' , $title , '</h1>
    							<p>' , $content , '</p> 
  							</div>
							<p class="bg-info"> <span style="color:#5bc0de">.</span></p>

							<div class="row">
  								<div class="col-md-8"><h3>Published By: <small>Hayder Ameen</small></h3></div>
  								<div class="col-md-4"><h3>Tagged with:<small> ', $tag ,' </small></h3></div>
							</div>
							<p class="bg-info"> <span style="color:#5bc0de">.</span></p>
							<h3 style="color: #fff; background-color: #ff3200; padding: 5px;" class="img-rounded">Comments:</h3>
						</div>';

					$comments_data = load_comments($c_id);
					
						if ($comments_data->num_rows >0) {
							
							while ($row = $comments_data->fetch_assoc()) {
								
								$author = $row['author_name'];
								
								$comment_body = $row['comment_content'];
								
								echo '<div class="panel-group">
								<div class="panel panel-success">
									    <div class="panel-heading">',$author,' said:</div>
									    <div class="panel-body">',$comment_body,'</div>
									  </div>
									  </div>';
								      
							}
						}
						else {
							echo '<h4 style="color: #fff; background-color: #a6a6a6; padding: 10px;">Be first to comment here :)</h4><br>';
						}
					}

					// Going to get comments data here from database and use the post ID to load specific comments
					// Load comments from SQL database using a query here
					// Add command in SQL query to select post ID as well so that it can be used here	
					// Using the post ID also add the submit comment form here so that comments are published
					// for specific post only

					// Need comment author(comment_id, commentator_name) and comment body(post_id, 'comment_id', comment) table
				}

				?>

			
			<div class="row">
				<div class="col-md-6"><?php include('comment_form.php'); ?></div>
				<div class="col-md-6"></div>
			</div>
		</div> 

		<div class="footer">
	<?php include('footer_2.php'); ?>
</div>
<div class="footer">
	<?php include('footer.php'); ?>
</div>
	</body>
</html>