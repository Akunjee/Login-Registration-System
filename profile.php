<?php
	session_start();
	require_once('functions.php');
	if(!user_logged()){
		header('location: register.php');
		die();
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Profile</title>
</head>
<body>
	<a href="admin/index.php">Admin Panel</a>
	<a href="logout.php">Logout</a>
</body>
</html>