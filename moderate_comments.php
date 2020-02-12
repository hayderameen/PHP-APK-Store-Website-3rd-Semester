<?php

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

	function select_comments() {
		$sql = "SELECT blog_post.Title, comment_body.comment_content, comment_body.comment_id, comment_author.author_name FROM blog_post INNER JOIN comment_body ON blog_post.ID=comment_body.ID INNER JOIN comment_author ON comment_body.comment_id=comment_author.comment_id 
			ORDER BY comment_body.comment_id DESC";
		
		global $connection;
		return $connection->query($sql);
	}
?>

<html>
<head>
	<title>Viewing All Comments - APKHOUSE Dashboard</title>
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
			<center><h2>Viewing All Comments</h2></center>
		</div>

		<h1 class="bg-info" style="padding: 15px;">Recent Comments</h1>
			
			<table class="table table-striped">
				<thead>
					<th>ID</th>
					<th>Author</th>
					<th>Commented On</th>
					<th>Comment</th>
					<th>Edit</th>
					<th>Delete</th>
				</thead>
				<tbody>
					<?php
						$data = select_comments();

						if ($data->num_rows>0) {
							while ($row = $data->fetch_assoc()) {
								$id = $row['comment_id'];
								$title = $row['Title'];
								$author = $row['author_name'];
								$comment = $row['comment_content'];

								echo '<tr>
										  <td>',$id,'</td>
									      <td>',$author,'</td>
									      <td>',$title,'</td>
									      <td>',$comment,'</td>
									      <td>
									      	<form method="post" action="comment_edit.php" role="form">
									      	Edit: <input type="submit" name="id" value="',$id,'">
									      	</form>
									      </td>
									      <td>
									      <form method="post" action="comment_delete.php" role="form">
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