<?php
	include "../connection.php";
	$id = $_GET['id'];
    $sql = "SELECT * FROM grade";
    $query = mysqli_query($connection, $sql);
    while($row = mysqli_fetch_assoc($query)) {
        $name = $row['name'];
	}
	
	if(isset($_POST['submit'])) {
		$name = $_POST['name'];
		$sql = "UPDATE grade SET name = '$name' WHERE id = $id";
        $query = mysqli_query($connection, $sql);
		header("location: grade.php");
	}
	mysqli_close($connection);
?>
<html lang="pt">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Editar Ano Escolar</title>
    </head>
    <body>
		<form method="POST">
			<h3>ID: <?php echo $id; ?></h3>
			<label for="name">Nome:</label>
            <input type="text" name="name" id="name" value="<?php echo $name; ?>" placeholder="Digite um nome"><br>
            <input type="submit" name="submit" value="Editar">
		</form>
	</body>
	<a href="grade.php"><button>Voltar</button></a>
</html>