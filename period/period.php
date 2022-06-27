<?php
    include '../connection.php';
    if(isset($_POST['submit'])) {
        $name = $_POST['name'];
		$start_time = $_POST['start_time'];
		$end_time = $_POST['end_time'];
        $sql = "INSERT INTO period (name, start_time, end_time) VALUES ('$name', '$start_time', '$end_time')";
        $query = mysqli_query($connection, $sql);
    }
    else if(isset($_POST['delete'])) {
        $id_selected = $_POST['delete'];
        $sql = "DELETE FROM period WHERE id = $id_selected";
        mysqli_query($connection, $sql);
        header("Refresh:0");
    }
?>
<html lang="pt">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cadastrar Período Escolar</title>
    </head>
    <body>
        <form method="POST">
            <div class="form" id="insert-form">
				<label for="name">Nome:</label>
                <input type="text" name="name" id="name" placeholder="Digite o nome"><br>
				<label for="start_time">Início:</label>
                <input type="time" name="start_time" id="start_time"><br>
				<label for="end_time">Termíno:</label>
                <input type="time" name="end_time" id="end_time"><br>
                <input type="submit" name="submit" value="Enviar">
            </div>
            <div class="list">
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
						<th>Inicio</th>
						<th>Término</th>
                        <th>Ações</th>
                    </tr>
                    <tr>
                        <?php
							$sql = "SELECT COUNT(*) FROM period";
							$query = mysqli_query($connection, $sql);
							$row = mysqli_fetch_row($query);
							if($row[0] != 0) {
								$sql = "SELECT * FROM period";
								$query = mysqli_query($connection, $sql);
								while($row = mysqli_fetch_assoc($query)) {
									$id = $row['id'];
									$name = $row['name'];
									$start_time = $row['start_time'];
									$end_time = $row['end_time'];
									echo '<tr>';
									echo '<td>'.$id.'</td>';
									echo '<td>'.$name.'</td>';
									echo '<td>'.$start_time.'</td>';
									echo '<td>'.$end_time.'</td>';
									echo '<td><button name="delete" value="'.$id.'">Deletar</button>';
									echo '<a href="edit.php?id='.$id.'"><input type="button" value="Editar"></a></td>';
									echo '</tr>';
								}
							}
							else {
								echo '<tr><td colspan="5">Não existem períodos escolares cadastrados ainda!</td></tr>';
							}
							mysqli_close($connection);
                        ?>
                    </tr>
                </table>
            </div>
        </form>
		<a href="../index.html"><button>Voltar</button></a>
    </body>
</html>