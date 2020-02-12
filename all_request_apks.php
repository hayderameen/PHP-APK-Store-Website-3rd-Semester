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

	$connection = new mysqli("localhost" , "root" , "root" , "apkhouse");

	if ($conenction->connect_error) {
		die ("Connection Unsuccessful. What went wrong? here it is: " . $connection->connect_error);
	}	

	// funtion to select unattended APks
	function select_apk_requests_none() {
		$sql = "SELECT * FROM apk_request WHERE done=0 ORDER BY request_id DESC";

		global $connection;
		return $connection->query($sql);
	}

	// funtion to select unattended APks
	function select_apk_requests_done() {
		$sql = "SELECT * FROM apk_request WHERE done=1";

		global $connection;
		return $connection->query($sql);
	}

?>

<html>
<head>
	<title>Viewing All APK Requests - APKHOUSE Dashboard</title>
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
			<center><h2>Viewing all APK Requests</h2></center>
		</div>

		<h1 class="bg-info" style="padding: 15px;">Unattended APK Requests</h1>
			
			<table class="table table-striped">
				<thead>
					<th>Request ID</th>
					<th>User Name</th>
					<th>Requested APK</th>
					<th>Mark as completed</th>
				</thead>
				<tbody>
					<?php
						$data = select_apk_requests_none();

						if ($data->num_rows>0) {
							while ($row = $data->fetch_assoc()) {
								$id = $row['request_id'];
								$name = $row['applicant'];
								$apk = $row['apk_name'];

								echo '<tr>
										  <td>',$id,'</td>
									      <td>',$name,'</td>
									      <td>',$apk,'</td>
									      <td>
									      	<form method="post" action="apk_request_complete.php" role="form">
									      	Submit: <input type="submit" name="id" value="',$id,'">
									      	</form>
									      </td>
								      </tr>';
							}
						}
					?>
				</tbody>
			</table>

			<!-- now attended apks -->

			<h1 class="bg-info" style="padding: 15px;">Completed APK Requests</h1>
			
			<table class="table table-striped">
				<thead>
					<th>Request ID</th>
					<th>User Name</th>
					<th>Requested APK</th>
				</thead>
				<tbody>
					<?php
						$data = select_apk_requests_done();

						if ($data->num_rows>0) {
							while ($row = $data->fetch_assoc()) {
								$id = $row['request_id'];
								$name = $row['applicant'];
								$apk = $row['apk_name'];

								echo '<tr>
										  <td>',$id,'</td>
									      <td>',$name,'</td>
									      <td>',$apk,'</td>
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