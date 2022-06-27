<?php
    include '../connection.php';
    if(isset($_POST['submit'])) {
		$teacher = $_POST['teacher'];
		$subject = $_POST['subject'];
        $sql = "INSERT INTO subject_teacher (teacher_id, subject_id) VALUES ($teacher, $subject)";
        $query = mysqli_query($connection, $sql);
    }
    else if(isset($_POST['delete'])) {
        $id_selected = $_POST['delete'];
        $sql = "DELETE FROM subject_teacher WHERE id = $id_selected";
        mysqli_query($connection, $sql);
        header("Refresh:0");
    }
?>
<html lang="pt">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cadastrar Professores e suas Matérias</title>
    </head>
    <body>
        <form method="POST">
            <div class="form" id="insert-form">
				<label for="teacher">Professor:</label>
				<select name="teacher" id="teacher">
					<?php
						$sql = "SELECT * FROM teacher ORDER BY id";
						$query = mysqli_query($connection, $sql);
						while($row = mysqli_fetch_assoc($query)) {
							$id = $row['id'];
							$name = $row['name'];	
							echo '<option value="'.$id.'">'.$id.' - '.$name.'</option>';
						}
					?>
				</select><br>
				<label for="subject">Matéria/Disciplina:</label>
				<select name="subject" id="subject">
					<?php
						$sql = "SELECT * FROM subject ORDER BY id";
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
						<th>Professor</th>
						<th>Matéria</th>
                        <th>Ações</th>
                    </tr>
                    <tr>
                        <?php
							$sql = "SELECT COUNT(*) FROM subject_teacher";
							$query = mysqli_query($connection, $sql);
							$row = mysqli_fetch_row($query);
							if($row[0] != 0) {
								$sql = "SELECT subject_teacher.id, teacher.id, teacher.name, subject.name FROM subject_teacher
								INNER JOIN teacher ON teacher.id = subject_teacher.teacher_id
								INNER JOIN subject ON subject.id = subject_teacher.subject_id";
								$query = mysqli_query($connection, $sql);
								while($column = mysqli_fetch_row($query)) {
									$id = $column[0];
									$teacher_id = $column[1];
									$teacher_name = $column[2];
									$subject_name = $column[3];
									echo '<tr>';
									echo '<td>'.$teacher_id.' - '.$teacher_name.'</td>';
									echo '<td>'.$subject_name.'</td>';
									echo '<td><button name="delete" value="'.$id.'">Deletar</button>';
									echo '<a href="edit.php?id='.$id.'"><input type="button" value="Editar"></a></td>';
									echo '</tr>';
								}
							}
							else {
								echo '<tr><td colspan="3">Não existem professores vinculados ainda!</td></tr>';
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