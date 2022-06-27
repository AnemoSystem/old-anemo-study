<?php
	include '../connection.php';

	$username = $_POST['username'];
	$id_skin = $_POST['id_skin'];
	$id_torso = $_POST['id_torso'];
	$id_hair = $_POST['id_hair'];
	$id_legs = $_POST['id_legs'];
	$sql = "UPDATE user SET id_skin = '$id_skin',
	id_torso = '$id_torso', id_legs = '$id_legs', 
	id_hair = '$id_hair' 
	WHERE user_nickname = '$username'";
	$query = mysqli_query($connection, $sql);
	$connection->close();
?>