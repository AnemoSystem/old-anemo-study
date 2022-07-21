<?php
	include '../connection.php';

	if(isset($_POST['test'])) { // Test if player has item
		$username = $_POST['username'];
		$item_id = $_POST['item_id'];
		$type = $_POST['type'];
		$sql = "SELECT user.user_nickname, clothes.item_id, clothes.type FROM clothes
		INNER JOIN user ON user.student_id = clothes.user_id
		WHERE clothes.type = '$type' AND user.user_nickname = '$username' AND clothes.item_id = '$item_id';";
		$query = mysqli_query($connection, $sql);

		if($query->num_rows > 0) {
			echo "Y";
		} else {
			echo "N";
		}
		$connection->close();
	} 
	else if(isset($_POST['username'])) { // Show Coins
		$username = $_POST['username'];
		$getset = $_POST['getset'];
		$item_id = $_POST['item_id'];
		$type = $_POST['type'];
		$coins = $_POST['coins'];
		if($getset == 1) {
			$sql = "SELECT student_id FROM user WHERE user_nickname = '$username';";
			$query = mysqli_query($connection, $sql);
			$user_id = mysqli_fetch_row($query);

			$sql = "INSERT INTO clothes (user_id, item_id, type) 
			VALUES ('".$user_id[0]."', '$item_id', '$type')";
			mysqli_query($connection, $sql);

			$sql = "UPDATE user SET coins = '$coins' WHERE user_nickname = '$username'";
			mysqli_query($connection, $sql);
		}
		$sql = "SELECT coins FROM user WHERE user_nickname = '$username';";
		$query = mysqli_query($connection, $sql);
		$result = mysqli_fetch_row($query);
		echo $result[0];
		$connection->close();
	}
?>
