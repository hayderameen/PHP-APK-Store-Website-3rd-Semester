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

	function select_posts() {
		$sql = "SELECT blog_post.ID, blog_post.Title , blog_post.Body, 
		              blog_tags.Name, 
		              featured_image.Link, featured_image.alt
		       FROM   blog_post INNER JOIN blog_tags ON blog_post.ID = blog_tags.ID INNER JOIN featured_image ON 
		              featured_image.ID = blog_tags.ID ORDER BY blog_post.ID DESC";
		
		global $connection;
		return $connection->query($sql);
	}
?>

<html>
<head>
	<title>Viewing All Blog Posts - APKHOUSE Dashboard</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<?php include('admin_header.php') ?>

	<br>
	<br>
	<br>
	<br>

	<div class="container">
		<div class="jumbotron">
			<center><h1>Dashboard - APKHOUSE</h1></center>
			<center><h2>Viewing all Blog Posts</h2></center>
		</div>

		<h1 class="bg-info" style="padding: 15px;">Published Articles</h1>
			
			<table class="table table-striped">
				<thead>
					<th>ID</th>
					<th>Title</th>
					<th>Tag</th>
					<th>Content</th>
					<th>Image</th>
					<th>Alt Tag</th>
					<th>Edit</th>
					<th>Delete</th>
				</thead>
				<tbody>
					<?php
						$data = select_posts();

						if ($data->num_rows>0) {
							while ($row = $data->fetch_assoc()) {
								$id = $row['ID'];
								$title = $row['Title'];
								$tag = $row['Name'];
								$content = $row['Body'];
								// Trimming content
								$content = substr($content,0,200);
								$content = $content . " .....";
								$img = $row['Link'];
								$alt = $row['alt'];

								echo '<tr>
										  <td>',$id,'</td>
									      <td>',$title,'</td>
									      <td>',$tag,'</td>
									      <td>',$content,'</td>
									      <td>
									      	<img src="', $img ,'" width="100" height="100">
									      	</td>
									      <td>',$alt,'</td>
									      <td>
									      	<form method="post" action="blog_edit.php" role="form">
									      	Edit: <input type="submit" name="id" value="',$id,'">
									      	</form>
									      </td>
									      <td>
									      <form method="post" action="blog_delete.php" role="form">
									       Delete: <input type="submit" name="id" value="',$id,'">
									       </form>
									      </td>
								      </tr>';
							}
						}
					?>
				</tbody>
			</table>

	</div> <!-- container ends here -->

	<div class="footer">
		<?php include('footer_admin.php') ?>
	</div>
</body>
</html>