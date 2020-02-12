<?php
	session_start();

	// remove all session variables
	session_unset(); 

	// destroy the session 
	session_destroy();

	echo 'Successfully logged out<br>';
	echo 'Redirecting to home....';
	echo '<script>window.location="index.php"</script>';
?>