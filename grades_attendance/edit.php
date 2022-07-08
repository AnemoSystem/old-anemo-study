<?php
	include "../connection.php";
	$id = $_GET['id'];
    $sql = "SELECT * FROM grades_attendance WHERE id = '$id'";
    $query = mysqli_query($connection, $sql);
    while($row = mysqli_fetch_assoc($query)) {
        $subject_teacher = $row['subject_teacher_id'];
		$student = $row['student_id'];
		$grade_value = $row['grade_value'];
		$month = $row['school_month'];
	}
	
	if(isset($_POST['submit'])) {
		$subject_teacher = $_POST['subject-teacher'];
		$student = $_POST['student'];
		$grade_value = $_POST['grade-value'];
		$month = $_POST['month'];
		$sql = "UPDATE grades_attendance SET subject_teacher_id = '$subject_teacher', 
		student_id = '$student', grade_value = '$grade_value', school_month = '$month' WHERE id = $id";
        $query = mysqli_query($connection, $sql);
		header("location: grades_attendance.php");
	}
?>
<html lang="pt">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Editar Professores e suas Matérias</title>
    </head>
    <body>
		<form method="POST">
			<label for="subject-teacher">Professor e Disciplina:</label>
			<select name="subject-teacher" id="subject-teacher">
				<?php
					$sql = "SELECT teacher.id, teacher.name, subject.name 
					FROM subject_teacher
					INNER JOIN teacher ON teacher.id = subject_teacher.teacher_id
					INNER JOIN subject ON subject.id = subject_teacher.subject_id
					ORDER BY subject_teacher.id";
					$query = mysqli_query($connection, $sql);
					while($column = mysqli_fetch_row($query)) {
						$id = $column[0];
						$teacher_name = $column[1];
						$subject = $column[2];
						if ($id == $subject_teacher)
							echo '<option value="'.$id.'" selected>'.$id.' - '.$teacher_name.' ('.$subject.')</option>';
						else
							echo '<option value="'.$id.'">'.$id.' - '.$teacher_name.' ('.$subject.')</option>';
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
						$student_name = $column[1];
						$grade = $column[2];
						$period = $column[3];
						if ($id == $student)
							echo '<option value="'.$id.'" selected>'.$id.' - '.$student_name.' ('.$grade.' - '.$period.')</option>';
						else
							echo '<option value="'.$id.'">'.$id.' - '.$student_name.' ('.$grade.' - '.$period.')</option>';
					}
					mysqli_close($connection);
				?>
			</select><br>
			<label for="grade-value">Nota:</label>
			<input type="number" value="<?php echo $grade_value ?>" name="grade-value" id="grade-value" min="0" max="10"><br>
			<label for="month">Bimestre:</label>
			<select name="month" id="month">
				<?php
					for($i = 1; $i < 4; $i++) {
						if($month == $i)
							echo '<option value="'.$i.'" selected>'.$i.'º</option>';
						else
							echo '<option value="'.$i.'">'.$i.'º</option>';
					}
				?>
			</select><br>
            <input type="submit" name="submit" value="Editar">
		</form>
	</body>
	<a href="grades_attendance.php"><button>Voltar</button></a>
</html>