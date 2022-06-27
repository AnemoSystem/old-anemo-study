<?php
    include '../connection.php';
    if(isset($_POST['submit'])) {
		$grade = $_POST['grade'];
		$period = $_POST['period'];
        $sql = "INSERT INTO classroom (grade_id, period_id) VALUES ($grade, $period)";
        $query = mysqli_query($connection, $sql);
    }
    else if(isset($_POST['delete'])) {
        $id_selected = $_POST['delete'];
        $sql = "DELETE FROM classroom WHERE id = $id_selected";
        mysqli_query($connection, $sql);
        header("Refresh:0");
    }
?>
<html lang="pt">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cadastrar Sala</title>
    </head>
    <body>
        <form method="POST">
            <div class="form" id="insert-form">
				<label for="grade">Ano Escolar:</label>
				<select name="grade" id="grade">
					<?php
						$sql = "SELECT * FROM grade ORDER BY id";
						$query = mysqli_query($connection, $sql);
						while($row = mysqli_fetch_assoc($query)) {
							$id = $row['id'];
							$name = $row['name'];	
							echo '<option value="'.$id.'">'.$name.'</option>';
						}
					?>
				</select><br>
				<label for="period">Período Escolar:</label>
				<select name="period" id="period">
					<?php
						$sql = "SELECT * FROM period ORDER BY id";
						$query = mysqli_query($connection, $sql);
						while($row = mysqli_fetch_assoc($query)) {
							$id = $row['id'];
							$name = $row['name'];
							echo '<option value="'.$id.'">'.$name.'</option>';
						}
					?>
				</select><br>
                <input type="submit" name="submit" value="Enviar">
            </div>
            <div class="list">
                <table>
                    <tr>
                        <th>ID</th>
						<th>Ano</th>
						<th>Período</th>
                        <th>Ações</th>
                    </tr>
                    <tr>
                        <?php
							$sql = "SELECT COUNT(*) FROM classroom";
							$query = mysqli_query($connection, $sql);
							$row = mysqli_fetch_row($query);
							if($row[0] != 0) {
								$sql = "SELECT classroom.id, grade.name, period.name FROM classroom
								INNER JOIN grade ON grade.id = classroom.grade_id
								INNER JOIN period ON period.id = classroom.period_id";
								$query = mysqli_query($connection, $sql);
								while($column = mysqli_fetch_row($query)) {
									$id = $column[0];
									$grade_name = $column[1];
									$period_name = $column[2];
									echo '<tr>';
									echo '<td>'.$id.'</td>';
									echo '<td>'.$grade_name.'</td>';
									echo '<td>'.$period_name.'</td>';
									echo '<td><button name="delete" value="'.$id.'">Deletar</button>';
									echo '<a href="edit.php?id='.$id.'"><input type="button" value="Editar"></a></td>';
									echo '</tr>';
								}
							}
							else {
								echo '<tr><td colspan="4">Não existem salas cadastradas ainda!</td></tr>';
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