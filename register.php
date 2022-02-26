<?php
	session_start();
	require_once('functions.php');
	if(user_logged()){
		header('location: profile.php');
		die();
	}
	if(isset($_POST['register'])){

		$email=$_POST['email'];
		$password=$_POST['password'];
		$error=array();
		
		if(!email_exists()){
			if($email==NULL){
				$error['email']="Email is Required";
			}
			if($password==NULL){
				$error['password']="Password is Required";
			}
			elseif(strlen($password)<5){
				$error['password']="Password must be more than six character long";
			}
			mysqli_query($connection,"INSERT INTO users(email,password)VALUES('$email','$password')");
			$errormail="you are registered! please <a href='login.php'>Login</a>";
			
		}else{
			$errormail="Email Already Exists! Please Try another with email";
		}
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div class="register">
		<form action="" method="POST">
			<input type="email" name="email" plceholder="Email Address"><br>
			<div class="error">
				<?php
					if(isset($error['email'])){
						echo $error['email'];
					}
				?>
			</div>
			<input type="password" name="password" placeholder="Password"><br>
			<div class="error">
				<?php
					if(isset($error['password'])){
						echo $error['password'];
					}
				?>
			</div>
			<input type="submit" name="register" value="Register">
		</form>
		<div class="errormain">
			<?php
				if(isset($errormail)){
					echo $errormail;
				}
			?>
		</div>
		Already have an account! please <a href="login.php">Login</a>
	</div>
</body>
</html>