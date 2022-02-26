<?php
	session_start();
	require_once('functions.php');
	if(user_logged()){
		header('location: profile.php');
		die();
	}
	if(isset($_POST['login'])){
		$email=$_POST['email'];
		$password=$_POST['password'];

		if(email_exists()){
			$password_query=mysqli_query($connection,"SELECT password FROM users WHERE email='$email'");
			$pass_obj=mysqli_fetch_assoc($password_query);
			if($password==$pass_obj['password']){
				$_SESSION['success']="Logged In";
				header('location:profile.php');
				echo "Yes you are logged In";
			}else{
				echo "Password doesn't match";
			}
		}else{
			echo "Email doesn't exists";
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
</head>
<body>
	<form action="" method="POST">
		<input type="email" name="email" placeholder="Email Address"><br>
		<input type="password" name="password" placeholder="Password"><br>
		<input type="submit" name="login" value="Login">
	</form>
	If you are not existing user please "<a href='register.php'>Register</a>";
</body>
</html>