<?php
	include '../connection.php';

	if(isset($_POST['username'])) {
		$username = $_POST['username'];
		$sql = "UPDATE user SET is_logged = 0 WHERE user_nickname = '$username'";
		$query = mysqli_query($connection, $sql);
		$connection->close();
	}
?>