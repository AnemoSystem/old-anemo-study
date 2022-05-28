<?php
	include '../connection.php';

	if(isset($_POST['username']) && isset($_POST['password'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];
		$sql = "SELECT user_nickname, user_password, is_logged FROM user 
		WHERE user_nickname = '$username' AND user_password = '$password'";
		$query = mysqli_query($connection, $sql);

		if($query->num_rows > 0) {
			echo "Login Success";
			$row = mysqli_fetch_row($query);
			if($row[2] == 0) {
				echo " - Disconnected";
				$sql = "UPDATE user SET is_logged = 1 WHERE user_nickname = '$username'";
				$query = mysqli_query($connection, $sql);
			}
			else
				echo " - Connected";
		} else {
			echo "Wrong Credentials";
		}
		$connection->close();
	}
?>