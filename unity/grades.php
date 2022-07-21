<?php
	include '../connection.php';
	if(isset($_POST['username'])) {
		$username = $_POST['username'];
		$subject = $_POST['subject'];
		$sql_grade = "SELECT teacher.name, subject.name, grades_attendance.grade_value, grades_attendance.school_month
		FROM grades_attendance
		INNER JOIN subject_teacher ON subject_teacher.id = grades_attendance.subject_teacher_id
		INNER JOIN teacher ON subject_teacher.teacher_id = teacher.id
		INNER JOIN subject ON subject_teacher.subject_id = subject.id
		INNER JOIN student ON grades_attendance.student_id = student.id
        INNER JOIN user ON user.student_id = student.id
		WHERE user.user_nickname = '$username' AND subject.name = '$subject'
		ORDER BY subject.name;";
		$query_grade = mysqli_query($connection, $sql_grade);

		$sql_class = "SELECT COUNT(*) FROM student_absence
		INNER JOIN user ON student_absence.student_id = user.student_id
		INNER JOIN subject_teacher ON subject_teacher.id = student_absence.subject_teacher_id
		INNER JOIN subject ON subject_teacher.subject_id = subject.id
		WHERE user.user_nickname = '$username' AND subject.name = '$subject';";
		$query_class = mysqli_query($connection, $sql_class);
		$rc = mysqli_fetch_row($query_class);

		$sql_absent = "SELECT COUNT(*) FROM student_absence
		INNER JOIN user ON student_absence.student_id = user.student_id
		INNER JOIN subject_teacher ON subject_teacher.id = student_absence.subject_teacher_id
		INNER JOIN subject ON subject_teacher.subject_id = subject.id
		WHERE user.user_nickname = '$username' AND student_absence.state = 'A' AND subject.name = '$subject';";
		$query_absent = mysqli_query($connection, $sql_absent);
		$ra = mysqli_fetch_row($query_absent);

		while($column = mysqli_fetch_row($query_grade)) {
			$teacher = $column[0];
			$subject = $column[1];
			$grade_value = $column[2];
			$month = $column[3];

			echo $teacher."%".$subject."%".$grade_value."%".$month."%".$rc[0]."%".$ra[0]."#";
		}
		$connection->close();
	}
?>