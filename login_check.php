<?php

	session_start();

	$connection = new mysqli("localhost", "root", "root", "apkhouse");

	if ($connection->connect_error) {
		die("Connection Unsuccessful because: " . $connection->connect_error);
	}

	$username = $_POST['username'];
	$password = $_POST['password'];

	$_SESSION['user'] = $username;
	$_SESSION['pass'] = $password;

		$sql = "SELECT username, password FROM login WHERE username='$username' AND password='$password'";

		$data = $connection->query($sql);

		if ($data->num_rows == 1) {
			echo 'Successful Login: Redirecting...<br>';
			echo '<script>window.location = "admin.php"</script>';
		}
		else {
			echo 'Login unsuccessful. Redirecting....';
			echo '<script>window.location = "login.php"</script>';
		}
?>

<html>
<head>
	<title>Redirect Page</title>
</head>
<body>
</body>
</html>