<?php
	include "../connection.php";
	$id = $_GET['id'];
    $sql = "SELECT * FROM grades_attendance";
    $query = mysqli_query($connection, $sql);
    while($row = mysqli_fetch_assoc($query)) {
        $subject_teacher = $row['subject_teacher_id'];
		$student = $row['student_id'];
		$grade_value = $row['grade_value'];
	}
	
	if(isset($_POST['submit'])) {
		$subject_teacher = $_POST['subject-teacher'];
		$student = $_POST['student'];
		$grade_value = $_POST['grade-value'];
		$sql = "UPDATE grades_attendance SET subject_teacher_id = '$subject_teacher', 
		student_id = '$student', grade_value = '$grade_value' WHERE id = $id";
        $query = mysqli_query($connection, $sql);
		header("location: grades_attendance.php");
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
        <title>Editar Professores e suas Matérias</title>
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
                <a href="../index.html"><img src="../img/logo.png" class="img"></a>
            <ul>
                <a href="function/function.php"><li>Função</li></a>
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
			<table>
				<tr class="table-header">
					<th>Editar Cadastro</th>
				</tr>
				<tr>
					<th>
						<label for="subject-teacher">Professor e Disciplina:</label>
						<select class="myBtn" name="subject-teacher" id="subject-teacher">
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
										if ($id == $subject_teacher)
											echo '<option value="'.$id.'" selected>'.$teacher_id.' - '.$teacher_name.' ('.$subject.')</option>';
										else
											echo '<option value="'.$id.'">'.$teacher_id.' - '.$teacher_name.' ('.$subject.')</option>';
									}
							?>
						</select><br>
						<label for="student">Estudante:</label>
						<select class="myBtn" name="student" id="student">
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
									if ($id == $student)
										echo '<option value="'.$id.'" selected>'.$id.' - '.$student.' ('.$grade.' - '.$period.')</option>';
									else
										echo '<option value="'.$id.'">'.$id.' - '.$student.' ('.$grade.' - '.$period.')</option>';
								}
								mysqli_close($connection);
							?>
						</select><br>
						<label for="grade-value">Nota:</label>
						<input class="myBtn" type="number" value="<?php echo $grade_value ?>" name="grade-value" id="grade-value" min="0" max="10"><br>
            			<input class="myBtn" type="submit" name="submit" value="Editar">
					</th>
				</tr>
			</table>
		</form>
	</div>
	</body>
</html>