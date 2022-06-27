<?php
	include '../connection.php';

	if(isset($_POST['username'])) {
		$username = $_POST['username'];
		$sql = "SELECT id_skin, id_torso, id_hair, id_legs, coins, points FROM user 
		WHERE user_nickname = '$username'";
		$query = mysqli_query($connection, $sql);

		if($query->num_rows > 0) {
			$row = mysqli_fetch_row($query);
			echo $row[0]."-".$row[1]."-".$row[2]."-".$row[3]."-".$row[4]."-".$row[5];
		} else {
			echo "No user data found.";
		}
		$connection->close();
	}
?>