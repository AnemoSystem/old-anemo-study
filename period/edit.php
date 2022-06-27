<?php
	include "../connection.php";
	$id = $_GET['id'];
    $sql = "SELECT * FROM period";
    $query = mysqli_query($connection, $sql);
    while($row = mysqli_fetch_assoc($query)) {
        $name = $row['name'];
		$start_time = $row['start_time'];
		$end_time = $row['end_time'];
	}
	
	if(isset($_POST['submit'])) {
		$name = $_POST['name'];
		$start_time = $_POST['start_time'];
		$end_time = $_POST['end_time'];
		$sql = "UPDATE period SET name = '$name', start_time = '$start_time', end_time = '$end_time' WHERE id = $id";
        $query = mysqli_query($connection, $sql);
		header("location: period.php");
	}
	mysqli_close($connection);
?>
<html lang="pt">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Editar Período Escolar</title>
    </head>
    <body>
		<form method="POST">
			<h3>ID: <?php echo $id; ?></h3>
			<label for="name">Nome:</label>
            <input type="text" name="name" id="name" value="<?php echo $name; ?>" placeholder="Digite um nome"><br>
			<label for="start_time">Início:</label>
            <input type="time" name="start_time" id="start_time" value="<?php echo $start_time; ?>"><br>
			<label for="end_time">Termíno:</label>
            <input type="time" name="end_time" id="end_time" value="<?php echo $end_time; ?>"><br>
            <input type="submit" name="submit" value="Editar">
		</form>
	</body>
	<a href="period.php"><button>Voltar</button></a>
</html>