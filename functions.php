<?php
	
	require_once('config.php');

	function email_exists(){
		global $connection;
		global $email;
		$result=mysqli_query($connection,"SELECT * FROM users WHERE email='$email'");
		if(mysqli_num_rows($result)==1){
			return true;
		}
	}

	function user_logged(){
		if(isset($_SESSION['success'])){
			return true;
		}
	}