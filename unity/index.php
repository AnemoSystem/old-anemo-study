<?php
	include '../connection.php';

	if(isset($_POST['username']) && isset($_POST['password'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];
		$sql = "SELECT user_nickname, user_password FROM user 
		WHERE user_nickname = '$username' AND user_password = '$password'";
		$query = mysqli_query($connection, $sql);
		if($query->num_rows > 0) {
			echo "Login Success";
		} else {
			echo "Wrong Credentials";
		}
	}

	$connection->close();
?>