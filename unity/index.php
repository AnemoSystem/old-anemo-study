<?php
	//include '../connection.php';
	$server = 'localhost';
    $database = 'school';
    $user = 'root';
    $password = '';
    $connection = new mysqli($server, $user, $password, $database);

    if(!$connection) {
        die(mysqli_error($connection));
    }

	if(isset($_POST['username']) && isset($_POST['password'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];
		$sql = "SELECT user_nickname, user_password FROM user 
		WHERE user_nickname = '$username' AND user_password = '$password'";
		$query = mysqli_query($connection, $sql);
		if($query->num_rows > 0) {
			//$row = mysqli_fetch_row($query);
			echo "Login Success";
		} else {
			echo "Wrong Credentials";
		}
	}

	$connection->close();
?>