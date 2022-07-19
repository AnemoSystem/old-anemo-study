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
<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
        <link rel="stylesheet" href="../css/style_index.css">
        <link rel="shortcut icon" href="../img/icon.ico"/>
        <!--<link rel="stylesheet" href="../css/function.css">!-->
        <title>Cadastrar Sala</title>
        <!--
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor"
            crossorigin="anonymous"
        >
        -->
    </head>
	<header>
        <nav class="navbar">
            <a href="../index.html"><img src="../img/logo.png"></a>
            <ul>
                <a href="../function/function.php"><li>Função</li></a>
                <a href="../employee/employee.php"><li>Funcionário</li></a>
                <a href="../subject/subject.php"><li>Contato</li></a>
                <a href="../grade/grade.php"><li>Ano Escolar</li></a>
                <a href="../period/period.php"><li>Período</li></a>
                <a href="../teacher/teacher.php"><li>Professor</li></a>
                <a href="../classroom/classroom.php"><li>Sala</li></a>
                <a href="../student/student.php"><li>Estudante</li></a>
                <a href="../grades_attendance/grades_attendance.php"><li>Notas</li></a>
            </ul>
        </nav>
    </header>
    <body>
	<div class="main">
        <form method="POST">
            <div class="form" id="insert-form">
				<table>
					<tr class="table-header">
						<th>Cadastrar</th>
					</tr>
					<tr>
						<th>
							<label for="grade">Ano Escolar:</label>
							<select class="myBtn" name="grade" id="grade">
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
						</th>
					</tr>
					<tr>
						<th>
							<label for="period">Período Escolar:</label>
							<select class="myBtn" name="period" id="period">
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
                			<input class="myBtn" type="submit" name="submit" value="Enviar">
						</th>
					</tr>

				</table>
            </div>
            <div class="list">
                <table>
                    <tr class="table-header">
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
									echo '<td><button class="myBtn" name="delete" value="'.$id.'">Deletar</button>';
									echo '<a href="edit.php?id='.$id.'"><input class="myBtn" type="button" value="Editar"></a></td>';
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
    </body>
</html>