<?php
	
	// Login check
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

	// Here will be multiple queries to display data according to needs :D

	// query to get apk requests data
	function select_apk_requests() {
		$sql = "SELECT * FROM apk_request WHERE done=0 ORDER BY request_id DESC LIMIT 5";

		global $connection;
		return $connection->query($sql);
	}

	// query to show uploaded APKs data
	function select_uploaded_apks() {
		$sql = "SELECT app.app_id, app.app_name, app.developer, category.name
       FROM app INNER JOIN apk ON app.app_id=apk.app_id INNER JOIN category on category.cat_id=app.cat_id
       ORDER BY app.app_id DESC LIMIT 5";

       global $connection;
       return $connection->query($sql);
	}

	//query to load blog posts
	function select_blog_posts() {
		$sql = "SELECT blog_post.ID, blog_post.Title , blog_tags.Name 
		       FROM blog_post INNER JOIN blog_tags ON blog_post.ID = blog_tags.ID ORDER BY blog_post.ID DESC LIMIT 5";
		
		global $connection;
		return $connection->query($sql);
	}

	function select_comments() {
		
		global $connection;

		$sql_comments="SELECT comment_body.comment_ID, comment_body.comment_content, comment_author.author_name
					   FROM comment_body INNER JOIN comment_author ON comment_body.comment_id=comment_author.comment_id
					   ORDER BY comment_body.comment_ID DESC LIMIT 5";

		return $connection->query($sql_comments);
	}
?>

<html>
<head>
	<title>Dashboard - APKHOUSE</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body id="top-home">

<?php include('admin_header.php'); ?>
<br>
<br>
<br>

<div class="container">
	<br>
	<div class="jumbotron">
		<center><h1>Dashboard - APKHOUSE</h1></center>
	</div> <!-- end of heading jumbotron -->

	<h1 class="bg-info" style="padding: 15px;">APK Dashboard</h1>

	<div class="row">
		<div class="col-md-6">
			<center><h2 class="bg-success" style="padding: 10px;">Recent APK Requests</h2></center>
			<center>
				<table class="table table-bordered">
					<thead>
						<th>Name of User</th>
						<th>Requested APK</th>
					</thead>
					<tbody>
						<?php
							$data = select_apk_requests();
							if ($data->num_rows>0) {
								while ($row = $data->fetch_assoc()) {
									$name = $row['applicant'];
									$apk = $row['apk_name'];

									echo '<tr>
										  	<td>',$name,'</td>
											<td>',$apk,'</td>
										  </tr>';
								}
							}
						?>
						
					</tbody>
				</table>
			</center>
			<div class="row">
				<div class="col-md-4"></div>
				<div class="col-md-4"></div>
				<div class="col-md-4" align="right">
					<a class="bg-primary" style="padding: 7px;" href="all_request_apks.php">View / Mark Complete</a>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<center><h2 class="bg-success" style="padding: 10px;">Recent APK Uploads</h2></center>
			<center>
				<table class="table table-bordered">
					<thead>
						<th>App Name</th>
						<th>Category</th>
						<th>Developer</th>
					</thead>
					<tbody>
						<?php
							$data = select_uploaded_apks();
							if ($data->num_rows>0) {
								while ($row = $data->fetch_assoc()) {
									$name = $row['app_name'];
									$dev = $row['developer'];
									$category = $row['name'];

									echo '<tr>
										  	<td>',$name,'</td>
											<td>',$category,'</td>
											<td>',$dev,'</td>
										  </tr>';
								}
							}
						?>
						
					</tbody>
				</table>
			</center>
			<div class="row">
				<div class="col-md-4"></div>
				<div class="col-md-4"></div>
				<div class="col-md-4" align="right"><a class="bg-primary" style="padding: 7px;" href="all_uploaded_apks.php">View / Edit / Delete</a></div>
			</div>
		</div>
	</div> <!-- end of row of apk dashboard -->

	<br>
			<h2 class="bg-danger" style="padding: 12px;">APK Publisher : </h2>
			<?php include('insert_apk.php'); ?>

			<!-- now starting blog dashboard from here -->

			<h1 class="bg-info" style="padding: 15px;">Blog Dashboard</h1>

	<div class="row">
		<div class="col-md-6">
			<center><h2 class="bg-success" style="padding: 10px;">Recently Published Posts</h2></center>
			<center>
				<table class="table table-bordered">
					<thead>
						<th>Title</th>
						<th>Tagged with</th>
					</thead>
					<tbody>
						<?php
							$data = select_blog_posts();
							if ($data->num_rows>0) {
								while ($row = $data->fetch_assoc()) {
									$name = $row['Title'];
									// Trimming Title
									if (strlen($name)>45) {
										$name = substr($name, 0, 45);
										$name = $name . "...";
									}
									$tag = $row['Name'];

									echo '<tr>
										  	<td>',$name,'</td>
											<td>',$tag,'</td>
										  </tr>';
								}
							}
						?>
						
					</tbody>
				</table>
			</center>
			<div class="row">
				<div class="col-md-4"></div>
				<div class="col-md-4"></div>
				<div class="col-md-4" align="right"><a class="bg-primary" style="padding: 7px;" href="all_blog_posts.php">View / Edit / Delete</a></div>
			</div>
		</div>
		<div class="col-md-6">
			<center><h2 class="bg-success" style="padding: 10px;">Recent Comments</h2></center>
			<center>
				<table class="table table-bordered">
					<thead>
						<th>Author</th>
						<th>Comment</th>
					</thead>
					<tbody>
						<?php
							$data = select_comments();
							if ($data->num_rows>0) {
								while ($row = $data->fetch_assoc()) {
									$comment = $row['comment_content'];
									// Trimming comment
									if (strlen($comment)>45) {
										$comment = substr($comment,0,45);
										$comment = $comment . "...";
									} 
									$author = $row['author_name'];

									echo '<tr>
										  	<td>',$author,'</td>
											<td>',$comment,'</td>
										  </tr>';
								}
							}
						?>
						
					</tbody>
				</table>
			</center>
			<div class="row">
				<div class="col-md-4"></div>
				<div class="col-md-4"></div>
				<div class="col-md-4" align="right"><a class="bg-primary" style="padding: 7px;" href="moderate_comments.php">Moderate Comments</a></div>
			</div>
		</div>
	</div> <!-- end of row of apk dashboard -->

	<br>
			<h2 class="bg-danger" style="padding: 12px;">Blog Publisher : </h2>
			<?php include('make_post.php'); ?>
		
</div> <!-- end of container -->

<div class="footer">
	<?php include('footer_admin.php'); ?>
</div>

</body>
</html>