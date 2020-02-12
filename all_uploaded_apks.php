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

	function select_apks() {
		$sql = "SELECT * FROM app INNER JOIN apk ON app.app_id=apk.app_id INNER JOIN app_image on app_image.app_id=apk.app_id INNER JOIN category on category.cat_id=app.cat_id
			ORDER BY app.app_id DESC";

		global $connection;
		return $connection->query($sql);
	}
?>

<html>
<head>
	<title>Viewing All APK Uploads - APKHOUSE Dashboard</title>
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
			<center><h2>Viewing all APK Uploads</h2></center>
		</div>

		<h1 class="bg-info" style="padding: 15px;">Uploaded APKs Info <small>Download Links Available on Edit Page Only</small></h1>
			
			<table class="table table-striped">
				<thead>
					<th>ID</th>
					<th>APK Name</th>
					<th>Category</th>
					<th>Developer</th>
					<th>Description</th>
					<th>Version</th>
					<!-- <th>Link</th> -->
					<th>Size</th>
					<th>Image</th>
					<th>Alt Tag</th>
					<th>Edit</th>
					<th>Delete</th>
				</thead>
				<tbody>
					<?php
						$data = select_apks();

						if ($data->num_rows>0) {
							while ($row = $data->fetch_assoc()) {
								$id = $row['app_id'];
								$apk_name = $row['app_name'];
								$desc = $row['description'];
								$version = $row['version'];
								$d_link = $row['link'];
								$size = $row['size'];
								$img = $row['link_img'];
								$alt = $row['alt'];
								$cat = $row['name'];
								$dev = $row['developer'];

								echo '<tr>
										  <td>',$id,'</td>
									      <td>',$apk_name,'</td>
									      <td>',$cat,'</td>
									      <td>',$dev,'</td>
									      <td>',$desc,'</td>
									      <td>',$version,'</td>
									      <td>',$size,'</td>
									      <td><img src="', $img ,'" width="100" height="100"></td>
									      <td>',$alt,'</td>
									      <td>
									      	<form method="post" action="apk_edit.php" role="form">
									      	Edit: <input type="submit" name="id" value="',$id,'">
									      	</form>
									      </td>
									      <td>
									      <form method="post" action="apk_delete.php" role="form">
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