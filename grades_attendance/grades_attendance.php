<?php
    include '../connection.php';
    if(isset($_POST['submit'])) {
		$subject_teacher = $_POST['subject-teacher'];
		$student = $_POST['student'];
		$grade_value = $_POST['grade-value'];
		$month = $_POST['month'];
        $sql = "INSERT INTO grades_attendance (subject_teacher_id, student_id, grade_value, school_month) 
		VALUES ($subject_teacher, $student, $grade_value, $month)";
        $query = mysqli_query($connection, $sql);
    }
    else if(isset($_POST['delete'])) {
        $id_selected = $_POST['delete'];
        $sql = "DELETE FROM grades_attendance WHERE id = $id_selected";
        mysqli_query($connection, $sql);
        header("Refresh:0");
    }
?>
<html lang="pt">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cadastrar Notas</title>
    </head>
    <body>
        <form method="POST">
            <div class="form" id="insert-form">
				<label for="subject-teacher">Professor e Disciplina:</label>
				<select name="subject-teacher" id="subject-teacher">
					<?php
						$sql = "SELECT subject_teacher.id, teacher.id, teacher.name, subject.name 
						FROM subject_teacher
						INNER JOIN teacher ON teacher.id = subject_teacher.teacher_id
						INNER JOIN subject ON subject.id = subject_teacher.subject_id
						ORDER BY subject_teacher.id";
						$query = mysqli_query($connection, $sql);
						while($column = mysqli_fetch_row($query)) {
							$id = $column[0];
							$teacher_id = $column[1];
							$teacher_name = $column[2];
							$subject = $column[3];
							echo '<option value="'.$id.'">'.$teacher_id.' - '.$teacher_name.' ('.$subject.')</option>';
						}
					?>
				</select><br>
				<label for="student">Estudante:</label>
				<select name="student" id="student">
					<?php
						$sql = "SELECT student.id, student.name, grade.name, period.name FROM student
						INNER JOIN classroom ON student.classroom_id = classroom.id
						INNER JOIN grade ON grade.id = classroom.grade_id
						INNER JOIN period ON period.id = classroom.period_id
						ORDER BY student.id";
						$query = mysqli_query($connection, $sql);
						while($column = mysqli_fetch_row($query)) {
							$id = $column[0];
							$student = $column[1];
							$grade = $column[2];
							$period = $column[3];
							echo '<option value="'.$id.'">'.$id.' - '.$student.' ('.$grade.' - '.$period.')</option>';
						}
					?>
				</select><br>
				<label for="grade-value">Nota:</label>
				<input type="number" name="grade-value" id="grade-value" min="0" max="10"><br>
				<label for="month">Bimestre:</label>
				<select name="month" id="month">
					<option value="1">1º</option>
					<option value="2">2º</option>
					<option value="3">3º</option>
					<option value="4">4º</option>
				</select><br>
                <input type="submit" name="submit" value="Enviar">
            </div>
            <div class="list">
                <table>
                    <tr>
						<th>Professor</th>
						<th>Disciplina</th>
						<th>Estudante</th>
                        <th>Nota</th>
						<th>Bimestre</th>
                    </tr>
                    <tr>
                        <?php
							$sql = "SELECT COUNT(*) FROM grades_attendance";
							$query = mysqli_query($connection, $sql);
							$row = mysqli_fetch_row($query);
							if($row[0] != 0) {
								$sql = "SELECT grades_attendance.id, teacher.id, grades_attendance.student_id, 
								grades_attendance.grade_value, teacher.name, subject.name, student.name,
								grade.name, period.name, grades_attendance.school_month FROM grades_attendance
								INNER JOIN subject_teacher ON grades_attendance.subject_teacher_id = subject_teacher.id
								INNER JOIN teacher ON teacher.id = subject_teacher.teacher_id
								INNER JOIN subject ON subject.id = subject_teacher.subject_id
								INNER JOIN student ON student.id = grades_attendance.student_id
								INNER JOIN classroom ON student.classroom_id = classroom.id
								INNER JOIN grade ON grade.id = classroom.grade_id
								INNER JOIN period ON period.id = classroom.period_id";
								$query = mysqli_query($connection, $sql);
								while($column = mysqli_fetch_row($query)) {
									$id = $column[0];
									$teacher_id = $column[1];
									$student_id = $column[2];
									$grade_value = $column[3];
									$teacher_name = $column[4];
									$subject_name = $column[5];
									$student_name = $column[6];
									$grade_name = $column[7];
									$period_name = $column[8];
									$month = $column[9];
									echo '<tr>';
									echo '<td>'.$teacher_id.' - '.$teacher_name.'</td>';
									echo '<td>'.$subject_name.'</td>';
									echo '<td>'.$student_id.' - '.$student_name.' ('.$grade_name.' - '.$period_name.')</td>';
									echo '<td>'.$grade_value.'</td>';
									echo '<td>'.$month.'</td>';
									echo '<td><button name="delete" value="'.$id.'">Deletar</button>';
									echo '<a href="edit.php?id='.$id.'"><input type="button" value="Editar"></a></td>';
									echo '</tr>';
								}
							}
							else {
								echo '<tr><td colspan="4">Não existem notas cadastradas ainda!</td></tr>';
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