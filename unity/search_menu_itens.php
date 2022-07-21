<?php
	include '../connection.php';

	if(isset($_POST['username'])) { // Test if player has item
		$username = $_POST['username'];
		$type = $_POST['type'];
		$sql = "SELECT clothes.item_id FROM clothes 
		INNER JOIN user ON user.student_id = clothes.user_id 
		WHERE clothes.type = '$type' AND user.user_nickname = '$username';";
		$query = mysqli_query($connection, $sql);
		
		$i = 0;
		while($column = mysqli_fetch_row($query)) {
			echo $column[0];
			$i++;
			if($query->num_rows > $i) echo "-";
		}
		$connection->close();
	}
?>