<?php
	$host = '';
	$user_name = '';
	$password = '';
	$db_name = '';

	$conn = mysqli_connect($host, $user_name, $password, $db_name);

	if (!$conn) {
		echo "Connection failed: ".mysqli_connect_error();
	}
?>